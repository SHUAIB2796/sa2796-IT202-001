<?php
require_once 'electronics_category.php';

// Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796

if (isset($_POST['categoryID'])) {
    $categoryID = $_POST['categoryID'];

   
    $category = ElectronicsCategory::getCategoryByID($categoryID);

    if ($category) {
      
        echo "<h2>Category Details</h2>";
        echo "<p>ID: " . $category['ElectronicsCategoryID'] . "</p>";
        echo "<p>Name: " . $category['ElectronicsCategoryName'] . "</p>";
        echo "<p>Code: " . $category['ElectronicsCategoryCode'] . "</p>";
        echo "<p>Aisle Number: " . $category['AisleNumber'] . "</p>";
    } else {
        echo "<h2>Error: Category not found.</h2>";
    }
} else {
    echo "<h2>Error: No category selected.</h2>";
}
?>
