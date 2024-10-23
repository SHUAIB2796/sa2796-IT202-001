<?php
require_once 'electronics_product.php';

// Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796 


if (isset($_POST['confirmUpdate'])) {
    
    $productID = $_POST['productID'];
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $model = $_POST['model'];
    $categoryID = $_POST['categoryID'];
    $wholesalePrice = $_POST['wholesalePrice'];
    $listPrice = $_POST['listPrice'];


   
    ?>
    <h2>Confirm Product Update</h2>
    <form action="update_electronics_product.inc.php" method="POST">
       
        <input type="hidden" name="productID" value="<?php echo $productID; ?>">
        <input type="hidden" name="productCode" value="<?php echo $productCode; ?>">
        <input type="hidden" name="productName" value="<?php echo $productName; ?>">
        <input type="hidden" name="description" value="<?php echo $description; ?>">
        <input type="hidden" name="model" value="<?php echo $model; ?>">
        <input type="hidden" name="categoryID" value="<?php echo $categoryID; ?>">
        <input type="hidden" name="wholesalePrice" value="<?php echo $wholesalePrice; ?>">
        <input type="hidden" name="listPrice" value="<?php echo $listPrice; ?>">


        <p><strong>Product Code:</strong> <?php echo $productCode; ?></p>
        <p><strong>Product Name:</strong> <?php echo $productName; ?></p>
        <p><strong>Description:</strong> <?php echo $description; ?></p>
        <p><strong>Model:</strong> <?php echo $model; ?></p>
        <p><strong>Category ID:</strong> <?php echo $categoryID; ?></p>
        <p><strong>Wholesale Price:</strong> $<?php echo $wholesalePrice; ?></p>
        <p><strong>List Price:</strong> $<?php echo $listPrice; ?></p>


        <input type="submit" name="finalUpdate" value="Confirm Update">
        <a href="index.php?content=list_electronics_products"><button type="button">Cancel</button></a>
    </form>
    <?php
} elseif (isset($_POST['finalUpdate'])) {
   
    $productID = $_POST['productID'];
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $model = $_POST['model'];
    $categoryID = $_POST['categoryID'];
    $wholesalePrice = $_POST['wholesalePrice'];
    $listPrice = $_POST['listPrice'];


    
    $product = new ElectronicsProduct();
    $result = $product->update($productID, $productCode, $productName, $description, $model, $categoryID, $wholesalePrice, $listPrice);
    if ($result) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Product Update</title>
        </head>
        <body>
            <h2>Product updated successfully!</h2>
            <a href='index.php?content=list_electronics_products'>Go back to List Products</a>
        </body>
        <?php
        
    } else {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Product Update</title>
        </head>
        <body>
            <h2>Error updating product.</h2>
        </body>
        <?php

    }
    
   
} else {
   
    $productID = isset($_POST['productID']) ? $_POST['productID'] : '';


    if (!empty($productID)) {
        $product = ElectronicsProduct::getProductByID($productID);


        if ($product) {
            ?>
            <h2>Update Product Details</h2>
            <form action="update_electronics_product.inc.php" method="POST">
                <input type="hidden" name="productID" value="<?php echo $product['ElectronicsProductID']; ?>">
                <table>
                    <tr>
                        <td><label for="productCode">Product Code:</label></td>
                        <td><input type="text" name="productCode" id="productCode" value="<?php echo $product['ElectronicsProductCode']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="productName">Product Name:</label></td>
                        <td><input type="text" name="productName" id="productName" value="<?php echo $product['ElectronicsProductName']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="description">Description:</label></td>
                        <td><textarea name="description" id="description" required><?php echo $product['ElectronicsDescription']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="model">Model:</label></td>
                        <td><input type="text" name="model" id="model" value="<?php echo $product['ElectronicsModel']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="categoryID">Category ID:</label></td>
                        <td><input type="number" name="categoryID" id="categoryID" value="<?php echo $product['ElectronicsCategoryID']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="wholesalePrice">Wholesale Price:</label></td>
                        <td><input type="number" step="0.01" name="wholesalePrice" id="wholesalePrice" value="<?php echo $product['ElectronicsWholesalePrice']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="listPrice">List Price:</label></td>
                        <td><input type="number" step="0.01" name="listPrice" id="listPrice" value="<?php echo $product['ElectronicsListPrice']; ?>" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="confirmUpdate" value="Save Changes">
                            <a href="index.php?content=list_electronics_products">
                                <button type="button">Cancel</button>
                            </a>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
        } else {
            echo "<h2>Product not found.</h2>";
        }
    } else {
        echo "<h2>No product ID provided.</h2>";
    }
}
