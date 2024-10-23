<?php
require 'electronics_product.php';
session_start();

// Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (isset($_POST['cancel'])) {
            echo "<h2>Update cancelled.</h2>";
            echo "<a href='index.php?content=list_electronics_products'>Go back to List Products</a>";
            exit();
        }

       
        $id = $_POST['productID'];
        $code = $_POST['productCode'];
        $name = $_POST['productName'];
        $description = $_POST['description'];
        $model = $_POST['model'];
        $categoryID = $_POST['categoryID'];
        $wholesalePrice = $_POST['wholesalePrice'];
        $listPrice = $_POST['listPrice'];

       
        if (empty($id) || empty($code) || empty($name) || empty($description) || empty($model) || empty($categoryID) || empty($wholesalePrice) || empty($listPrice)) {
            echo "<h2>Error: All fields are required.</h2>";
            echo "<a href='index.php?content=update_electronics_product&productID={$id}'>Go back to Update Page</a>";
            exit();
        }

       
        if (!is_numeric($categoryID) || !is_numeric($wholesalePrice) || !is_numeric($listPrice)) {
            echo "<h2>Error: Category ID, Wholesale Price, and List Price must be numeric.</h2>";
            echo "<a href='index.php?content=update_electronics_product&productID={$id}'>Go back to Update Page</a>";
            exit();
        }

        
        $product = new ElectronicsProduct();
        $result = $product->update($id, $code, $name, $description, $model, $categoryID, $wholesalePrice, $listPrice);

        if ($result) {
            echo "<h2>Product updated successfully!</h2>";
        } else {
            echo "<h2>Error updating product.</h2>";
        }

        
        echo "<meta http-equiv='refresh' content='2;url=index.php?content=list_electronics_products'>";
        exit();
    }
} else {
    echo "<h2>Error: You must be logged in to update products.</h2>";
}
?>
