<?php 
require_once 'electronics_product.php';
require_once 'database.php';

// Shuaib Ali, 11-05-24, IT202-001 Phase 04 Assignment Email: sa2796@njit.edu UCID: sa2796


$conn = getDB();
if (!$conn) {
    $error_message = "Error: Unable to connect to the database.";
}


$error_message = "";
$success_message = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = htmlspecialchars($_POST['productCode']);
    $name = htmlspecialchars($_POST['productName']);
    $description = htmlspecialchars($_POST['description']);
    $model = htmlspecialchars($_POST['model']);
    $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
    $wholesalePrice = filter_input(INPUT_POST, 'wholesalePrice', FILTER_VALIDATE_FLOAT);
    $listPrice = filter_input(INPUT_POST, 'listPrice', FILTER_VALIDATE_FLOAT);

    
    if (empty($categoryID) || empty($code) || empty($name) || empty($description) || empty($model) || empty($wholesalePrice) || empty($listPrice)) {
        $error_message = "Error: All fields are required.";
    } elseif (strlen($code) < 3 || strlen($code) > 10) {
        $error_message = "Error: Product Code must be between 3 and 10 characters.";
    } elseif (strlen($name) < 10 || strlen($name) > 100) {
        $error_message = "Error: Product Name must be between 10 and 100 characters.";
    } elseif (strlen($description) < 100 || strlen($description) > 255) {
        $error_message = "Error: Description must be between 100 and 255 characters.";
    } elseif (!is_numeric($categoryID) || $categoryID < 1) {
        $error_message = "Error: Invalid Category ID. Please select a valid category.";
    } elseif (!is_numeric($wholesalePrice) || $wholesalePrice <= 0) {
        $error_message = "Error: Wholesale Price must be a positive decimal value.";
    } elseif (!is_numeric($listPrice) || $listPrice <= 0) {
        $error_message = "Error: List Price must be a positive decimal value.";
    } else {
        
        $categoryCheck = $conn->prepare("SELECT * FROM ElectronicsCategories WHERE ElectronicsCategoryID = ?");
        $categoryCheck->bind_param("i", $categoryID);
        $categoryCheck->execute();
        $categoryResult = $categoryCheck->get_result();

        if ($categoryResult->num_rows == 0) {
            $error_message = "Error: Invalid Category ID. Please select a valid category.";
        } else {
           
            $query = "SELECT * FROM ElectronicsProducts WHERE ElectronicsProductCode = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $code);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error_message = "Error: Product code already exists. Please use a different code.";
            } else {
                $product = new ElectronicsProduct($code, $name, $description, $model, $categoryID, $wholesalePrice, $listPrice);

                if ($product->save()) {
                    $success_message = "Product added successfully!";
                } else {
                    $error_message = "Error: Failed to add product.";
                }
            }

            $stmt->close();
        }

        $categoryCheck->close();
    }

    $conn->close();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Add a New Product</h2>

    
    <?php if (!empty($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php elseif (!empty($success_message)): ?>
        <p class="success"><?php echo $success_message; ?></p>
        <a href="index.php?content=list_products">Go to List Products</a>
    <?php endif; ?>

    <form action="add_electronics_product.inc.php" method="POST">
        <label for="productCode">Product Code:</label>
        <input type="text" name="productCode" id="productCode"><br>

        <label for="productName">Product Name:</label>
        <input type="text" name="productName" id="productName"><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea><br>

        <label for="model">Model:</label>
        <input type="text" name="model" id="model"><br>

        <label for="categoryID">Category ID:</label>
        <input type="text" name="categoryID" id="categoryID"><br>

        <label for="wholesalePrice">Wholesale Price:</label>
        <input type="number" step="0.01" name="wholesalePrice" id="wholesalePrice"><br>

        <label for="listPrice">List Price:</label>
        <input type="number" step="0.01" name="listPrice" id="listPrice"><br>

        <input type="submit" value="Add Product">
    </form>

    <?php include 'footer.inc.php'; ?>
</body>
</html>
