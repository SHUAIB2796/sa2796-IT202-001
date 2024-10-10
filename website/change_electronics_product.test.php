<?php
require 'electronics_product.php';  
$product = new ElectronicsProduct();


// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796
$id = $_GET['productID'] ?? '';  
$code = $_GET['productCode'] ?? '';
$name = $_GET['productName'] ?? '';
$description = $_GET['description'] ?? '';
$model = $_GET['model'] ?? '';
$categoryID = $_GET['categoryID'] ?? '';
$wholesale = $_GET['wholesale'] ?? '';
$listPrice = $_GET['listPrice'] ?? '';

$product->update($id, $code, $name, $description, $model, $categoryID, $wholesale, $listPrice);

echo "Product updated!";
?>
