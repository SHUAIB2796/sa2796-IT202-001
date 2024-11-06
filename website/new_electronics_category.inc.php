<form action="add_electronics_category.inc.php" method="POST" novalidate>
    <table>
        
        <tr>
            <td><label for="categoryID">Category ID:</label></td>
            <td><input type="text" name="categoryID" id="categoryID" required minlength="3" maxlength="10"></td>
        </tr>
        
        
        <tr>
            <td><label for="categoryCode">Category Code:</label></td>
            <td><input type="text" name="categoryCode" id="categoryCode" required minlength="3" maxlength="10"></td>
        </tr>
        
        
        <tr>
            <td><label for="categoryName">Category Name:</label></td>
            <td><input type="text" name="categoryName" id="categoryName" required minlength="10" maxlength="100"></td>
        </tr>
        
        
        <tr>
            <td><label for="aisleNumber">Aisle Number:</label></td>
            <td><input type="number" name="aisleNumber" id="aisleNumber" required min="1" max="999"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="Add Category"></td>
        </tr>
    </table>
</form>

<!-- Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796 -->
<!-- Shuaib Ali, 11-05-24, IT202-001 Phase 04 Assignment Email: sa2796@njit.edu UCID: sa2796 -->
