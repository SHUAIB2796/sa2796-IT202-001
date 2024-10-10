<?php
require 'electronics_product.php';

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796

$products = ElectronicsProduct::getAllProducts();

if (!empty($products)) {
    foreach ($products as $product) {
        echo "ID: " . $product['ElectronicsProductID'] . " - Code: " . $product['ElectronicsProductCode'] . " - Name: " . $product['ElectronicsProductName'] . " - Price: $" . $product['ElectronicsListPrice'] . "<br>";
    }
} else {
    echo "No products found.";
}
?>
