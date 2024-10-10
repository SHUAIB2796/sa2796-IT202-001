<?php
require 'electronics_product.php';  

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796

$product = new ElectronicsProduct();

$id = $_GET['productID'];

$product->delete($id);

echo "Product deleted!";
?>
