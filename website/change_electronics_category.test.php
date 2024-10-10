<?php
require 'electronics_category.php';

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796

$category = new ElectronicsCategory();

$id = $_GET['categoryID'];
$code = $_GET['categoryCode'];
$name = $_GET['categoryName'];
$aisle = $_GET['aisleNumber'];


$category->update($id, $code, $name, $aisle);

echo "Category updated!";
?>
