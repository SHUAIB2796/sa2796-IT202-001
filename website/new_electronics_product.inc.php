<form action="add_electronics_product.inc.php" method="POST" novalidate>
    <table>
        
        <tr>
            <td><label for="productCode">Product Code:</label></td>
            <td><input type="text" name="productCode" id="productCode" required minlength="3" maxlength="10"></td>
        </tr>

        
        <tr>
            <td><label for="productName">Product Name:</label></td>
            <td><input type="text" name="productName" id="productName" required minlength="10" maxlength="100"></td>
        </tr>

        
        <tr>
            <td><label for="description">Description:</label></td>
            <td><input type="text" name="description" id="description" required minlength="100" maxlength="255"></td>
        </tr>

        
        <tr>
            <td><label for="model">Model:</label></td>
            <td><input type="text" name="model" id="model" required minlength="3" maxlength="10"></td>
        </tr>

        
        <tr>
            <td><label for="categoryID">Category ID:</label></td>
            <td><input type="text" name="categoryID" id="categoryID" required minlength="3" maxlength="10"></td>
        </tr>

        
        <tr>
            <td><label for="wholesalePrice">Wholesale Price:</label></td>
            <td><input type="number" name="wholesalePrice" id="wholesalePrice" required min="0.01" max="10000" step="0.01"></td>
        </tr>

        
        <tr>
            <td><label for="listPrice">List Price:</label></td>
            <td><input type="number" name="listPrice" id="listPrice" required min="0.01" max="20000" step="0.01"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="Add Product"></td>
        </tr>
    </table>
</form>
<!-- Shuaib Ali, 11-05-24, IT202-001 Phase 04 Assignment Email: sa2796@njit.edu UCID: sa2796 -->
