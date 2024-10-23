<?php
require_once 'electronics_product.php';
require_once 'database.php';

$conn = getDB();
if (!$conn) {
    echo "<h2>Error: Unable to connect to the database.</h2>";
    exit();
}


// Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   
    $code = isset($_POST['productCode']) ? $_POST['productCode'] : '';
    $name = isset($_POST['productName']) ? $_POST['productName'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $model = isset($_POST['model']) ? $_POST['model'] : '';
    $categoryID = isset($_POST['categoryID']) ? $_POST['categoryID'] : '';
    $wholesalePrice = isset($_POST['wholesalePrice']) ? $_POST['wholesalePrice'] : '';
    $listPrice = isset($_POST['listPrice']) ? $_POST['listPrice'] : '';

    
    if (empty($categoryID)) {
        echo "<h2>Error: Category ID cannot be empty.</h2>";
        echo "<a href='index.php?content=new_electronics_product'>Go back to Add Product page</a>";
        exit();
    }

    
    if (empty($code) || empty($name) || empty($description) || empty($model) || empty($categoryID) || empty($wholesalePrice) || empty($listPrice)) {
        echo "<h2>Error: All fields are required.</h2>";
        echo "<a href='index.php?content=new_electronics_product'>Go back to Add Product page</a>";
        exit();
    }

    
    if (!is_numeric($categoryID)) {
        echo "<h2>Error: Category ID must be numeric.</h2>";
        echo "<a href='index.php?content=new_electronics_product'>Go back to Add Product page</a>";
        exit();
    }

    
    $categoryCheck = $conn->prepare("SELECT * FROM ElectronicsCategories WHERE ElectronicsCategoryID = ?");
    $categoryCheck->bind_param("i", $categoryID);
    $categoryCheck->execute();
    $categoryResult = $categoryCheck->get_result();

    if ($categoryResult->num_rows == 0) {
        echo "<h2>Error: Invalid Category ID. Please select a valid category.</h2>";
        echo "<a href='index.php?content=new_electronics_product'>Go back to Add Product page</a>";
        exit();
    }

    
    $query = "SELECT * FROM ElectronicsProducts WHERE ElectronicsProductCode = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        echo "<h2>Error: Product code already exists. Please use a different code.</h2>";
        echo "<a href='index.php?content=new_electronics_product'>Go back to Add Product page</a>";
    } else {
        
        $product = new ElectronicsProduct($code, $name, $description, $model, $categoryID, $wholesalePrice, $listPrice);
        
        if ($product->save()) {
            echo "<h2>Product added successfully!</h2>";
            echo "<a href='index.php?content=list_products'>Go to List Products</a>";
        } else {
            echo "<h2>Error: Failed to add product.</h2>";
            echo "<a href='index.php?content=new_electronics_product'>Go back to Add Product page</a>";
        }
    }

    
    $stmt->close();
    $conn->close();

} else {
    
    ?>

    <!-- HTML form for adding a new product -->
    <form action="add_electronics_product.inc.php" method="POST">
        <label for="productCode">Product Code:</label>
        <input type="text" name="productCode" id="productCode" required><br>

        <label for="productName">Product Name:</label>
        <input type="text" name="productName" id="productName" required><br>

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required><br>

        <label for="model">Model:</label>
        <input type="text" name="model" id="model" required><br>

        <label for="categoryID">Category ID:</label>
        <input type="text" name="categoryID" id="categoryID"><br>

        <label for="wholesalePrice">Wholesale Price:</label>
        <input type="text" name="wholesalePrice" id="wholesalePrice" required><br>

        <label for="listPrice">List Price:</label>
        <input type="text" name="listPrice" id="listPrice" required><br>

        <input type="submit" value="Add Product">
    </form>

    <?php
}
include 'footer.inc.php';
?>
