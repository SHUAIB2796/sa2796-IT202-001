<?php
require 'electronics_category.php';

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796

$categories = ElectronicsCategory::getAllCategories();
foreach ($categories as $category) {
    echo "ID: " . $category['ElectronicsCategoryID'] . " - Name: " . $category['ElectronicsCategoryName'] . "<br>";
}
?>
