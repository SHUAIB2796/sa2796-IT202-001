<?php 
require_once 'electronics_product.php';

// Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796

// Fetch all products
$products = ElectronicsProduct::getAllProducts(); 

// Handle POST Requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle Find Request
    $productID = isset($_POST['productID']) ? $_POST['productID'] : '';

    if (empty($productID)) {
        // Skip the check and proceed to delete if the product ID is somehow empty
        $productID = null; // Or set a default value, but ensure you're handling this in the database query
    
    } elseif (!is_numeric($productID)) {
        echo "<h2>Error: Product ID must be numeric.</h2>";
        echo "<a href='index.php?content=list_electronics_products'>Go back to Product List</a>";
        exit();
    } else {
        // Fetch Product
        $product = ElectronicsProduct::getProductByID($productID);

        if (!$product) {
            echo "<h2>Error: No product found with that ID.</h2>";
            echo "<a href='index.php?content=list_electronics_products'>Go back to Product List</a>";
            exit();
        } else {
            if (isset($_POST['update'])) {
                echo "<form method='POST' action='index.php?content=update_electronics_product'>";
                echo "<input type='hidden' name='productID' value='{$product['ElectronicsProductID']}'>";
                echo "<input type='hidden' name='productCode' value='{$product['ElectronicsProductCode']}'>";
                echo "<input type='hidden' name='productName' value='{$product['ElectronicsProductName']}'>";
                echo "<input type='hidden' name='description' value='{$product['ElectronicsDescription']}'>";
                echo "<input type='hidden' name='model' value='{$product['ElectronicsModel']}'>";
                echo "<input type='hidden' name='categoryID' value='{$product['ElectronicsCategoryID']}'>";
                echo "<input type='hidden' name='wholesalePrice' value='{$product['ElectronicsWholesalePrice']}'>";
                echo "<input type='hidden' name='listPrice' value='{$product['ElectronicsListPrice']}'>";
                echo "<script>document.forms[0].submit();</script>";
                exit();
            }

            if (isset($_POST['cancel'])) {
                echo "<h2>Action Canceled.</h2>";
                echo "<a href='index.php?content=list_electronics_products'>Go back to Product List</a>";
                exit();
            }

            echo "<h2>Product Details</h2>";
            echo "<p><strong>ID:</strong> " . $product['ElectronicsProductID'] . "</p>";
            echo "<p><strong>Name:</strong> " . $product['ElectronicsProductName'] . "</p>";
            echo "<p><strong>Code:</strong> " . $product['ElectronicsProductCode'] . "</p>";
            echo "<p><strong>Description:</strong> " . $product['ElectronicsDescription'] . "</p>";
            echo "<p><strong>Model:</strong> " . $product['ElectronicsModel'] . "</p>";
            echo "<p><strong>Category ID:</strong> " . $product['ElectronicsCategoryID'] . "</p>";
            echo "<p><strong>Wholesale Price:</strong> $" . $product['ElectronicsWholesalePrice'] . "</p>";
            echo "<p><strong>List Price:</strong> $" . $product['ElectronicsListPrice'] . "</p>";
            echo "<form method='POST' action='index.php?content=list_electronics_products'>";
            echo "<input type='hidden' name='productID' value='{$product['ElectronicsProductID']}'>";
            echo "<button type='submit' name='update'>Update</button>";
            echo "<button type='submit' name='cancel'>Cancel</button>";
            echo "</form>";
            exit();
        }
    }

    if (isset($_POST['deleteProductID'])) {
        $deleteProductID = $_POST['deleteProductID'];

        if (empty($deleteProductID)) {
            echo "<h2>Error: Product ID cannot be empty.</h2>";
            echo "<a href='index.php?content=list_electronics_products'>Go back to Product List</a>";
            exit();
        } elseif (!is_numeric($deleteProductID)) {
            echo "<h2>Error: Product ID must be numeric.</h2>";
            echo "<a href='index.php?content=list_electronics_products'>Go back to Product List</a>";
            exit();
        } else {
            $product = new ElectronicsProduct();
            $result = $product->delete($deleteProductID);

            if ($result) {
                echo "<h2>Product ID $deleteProductID deleted successfully!</h2>";
            } 

            $products = ElectronicsProduct::getAllProducts();
        }
    }
}
?>

<!-- Find Product Form -->
<form method="POST" action="index.php?content=list_electronics_products">
    <label for="productID">Enter Product ID to Find:</label>
    <input type="text" name="productID" id="productID">
    <button type="submit">Find</button>
</form>

<!-- Product List -->
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <?php 
            echo "ID: " . $product['ElectronicsProductID'] . " - ";
            echo $product['ElectronicsProductName']; 
            echo " (Code: " . $product['ElectronicsProductCode'] . ", ";
            echo "Model: " . (isset($product['ElectronicsModel']) ? $product['ElectronicsModel'] : 'N/A') . ", ";
            echo "Wholesale Price: $" . (isset($product['ElectronicsWholesalePrice']) ? number_format($product['ElectronicsWholesalePrice'], 2) : 'N/A') . ", ";
            echo "List Price: $" . (isset($product['ElectronicsListPrice']) ? number_format($product['ElectronicsListPrice'], 2) : 'N/A') . ", ";
            echo "Description: " . (isset($product['ElectronicsDescription']) ? $product['ElectronicsDescription'] : 'N/A') . ", ";
            echo "Category ID: " . (isset($product['ElectronicsCategoryID']) ? $product['ElectronicsCategoryID'] : 'N/A') . ")";
            ?>
            <!-- Delete Button -->
            <form method="POST" action="index.php?content=list_electronics_products" style="display:inline;">
                <input type="hidden" name="deleteProductID" value="<?= $product['ElectronicsProductID'] ?>">
                <button type="submit" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
