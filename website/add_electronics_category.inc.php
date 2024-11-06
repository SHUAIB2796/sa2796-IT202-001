<?php
require_once 'electronics_category.php';

// Shuaib Ali, 11-05-24, IT202-001 Phase 04 Assignment Email: sa2796@njit.edu UCID: sa2796


$error_message = ""; 
$success_message = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_SANITIZE_NUMBER_INT);
    $categoryCode = htmlspecialchars($_POST['categoryCode']);
    $categoryName = htmlspecialchars($_POST['categoryName']);
    $aisleNumber = filter_input(INPUT_POST, 'aisleNumber', FILTER_SANITIZE_NUMBER_INT);

    
    if (empty($categoryID) || empty($categoryCode) || empty($categoryName) || empty($aisleNumber)) {
        $error_message .= "<p>Error: All fields are required.</p>";
    }

    if (!is_numeric($categoryID) || strlen((string)$categoryID) < 3 || strlen((string)$categoryID) > 10) {
        $error_message .= "<p>Error: Category ID must be a numeric value between 3 and 10 characters.</p>";
    }

    if (!is_numeric($aisleNumber)) {
        $error_message .= "<p>Error: Aisle Number must be numeric.</p>";
    }

    if (strlen($categoryCode) < 3 || strlen($categoryCode) > 10) {
        $error_message .= "<p>Error: Category Code must be between 3 and 10 characters.</p>";
    }

    if (strlen($categoryName) < 10 || strlen($categoryName) > 100) {
        $error_message .= "<p>Error: Category Name must be between 10 and 100 characters.</p>";
    }

    
    if (empty($error_message)) {
        $newCategory = new ElectronicsCategory();
        $newCategory->setCategoryID($categoryID);
        $newCategory->setCategoryCode($categoryCode);
        $newCategory->setCategoryName($categoryName);
        $newCategory->setAisleNumber($aisleNumber);

        if ($newCategory->save()) {
            $success_message = "<p>Category added successfully!</p>";
        } else {
            $error_message = "<p>Error: Could not add the category. Please try again.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Electronics Category</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Add a New Category</h2>


<?php
if (!empty($error_message)) {
    echo "<div class='error'>$error_message</div>";
}
if (!empty($success_message)) {
    echo "<div class='success'>$success_message</div>";
    echo "<a href='index.php?content=list_electronics_categories' class='button'>Go back to List Categories</a>";
}
?>

<form action="add_electronics_category.inc.php" method="POST">
    <label for="categoryID">Category ID:</label>
    <input type="text" name="categoryID" id="categoryID" value="<?php echo isset($categoryID) ? htmlspecialchars($categoryID) : ''; ?>"><br>

    <label for="categoryCode">Category Code:</label>
    <input type="text" name="categoryCode" id="categoryCode" value="<?php echo isset($categoryCode) ? htmlspecialchars($categoryCode) : ''; ?>"><br>

    <label for="categoryName">Category Name:</label>
    <input type="text" name="categoryName" id="categoryName" value="<?php echo isset($categoryName) ? htmlspecialchars($categoryName) : ''; ?>"><br>

    <label for="aisleNumber">Aisle Number:</label>
    <input type="text" name="aisleNumber" id="aisleNumber" value="<?php echo isset($aisleNumber) ? htmlspecialchars($aisleNumber) : ''; ?>"><br>

    <input type="submit" value="Add Category">
</form>

<?php include 'footer.inc.php'; ?>

</body>
</html>
