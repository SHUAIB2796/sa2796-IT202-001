<?php
require 'electronics_category.php';

// Shuaib Ali, 11-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796
// Shuaib Ali, 11-21-24, IT202-001 Phase 05 Assignment Email: sa2796@njit.edu UCID: sa2796


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['categoryID'] ?? null;
    $code = $_GET['categoryCode'] ?? null;
    $name = $_GET['categoryName'] ?? null;
    $aisle = $_GET['aisleNumber'] ?? null;

    if (empty($id) || empty($code) || empty($name) || empty($aisle)) {
        echo "Error: All fields are required.";
        exit;
    }

    if (!is_numeric($id) || !is_numeric($aisle)) {
        echo "Error: Category ID and Aisle Number must be numeric.";
        exit;
    }

    $category = new ElectronicsCategory();
    $result = $category->update($id, $code, $name, $aisle);

    if ($result) {
        echo "Category updated successfully!";
    } 
    echo '<br><br><form method="GET" action="index.php">
            <input type="hidden" name="content" value="list_electronics_categories">
            <button type="submit">Back to List Categories</button>
          </form>';
} else {
    echo "Invalid request method. Please use GET.";
    echo '<br><a href="index.php?content=list_electronics_categories">Back to List Categories</a>';
    
} 
?>