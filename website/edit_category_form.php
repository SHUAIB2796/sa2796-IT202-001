<?php
// Shuaib Ali, 11-21-24, IT202-001 Phase 05 Assignment Email: sa2796@njit.edu UCID: sa2796

$id = $_GET['categoryID'] ?? '';
$code = $_GET['categoryCode'] ?? '';
$name = $_GET['categoryName'] ?? '';
$aisle = $_GET['aisleNumber'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <h2>Edit Category</h2>
    <form method="GET" action="change_electronics_category.test.php">
        <label for="categoryID">Category ID:</label>
        <input type="text" name="categoryID" id="categoryID" value="<?= htmlspecialchars($id) ?>" readonly><br>

        <label for="categoryCode">Category Code:</label>
        <input type="text" name="categoryCode" id="categoryCode" value="<?= htmlspecialchars($code) ?>" required><br>

        <label for="categoryName">Category Name:</label>
        <input type="text" name="categoryName" id="categoryName" value="<?= htmlspecialchars($name) ?>" required><br>

        <label for="aisleNumber">Aisle Number:</label>
        <input type="text" name="aisleNumber" id="aisleNumber" value="<?= htmlspecialchars($aisle) ?>" required><br>

        <button type="submit">Update Category</button>
    </form>

    <form method="GET" action="index.php">
        <input type="hidden" name="content" value="change_electronics_categories.test.php">
        <button type="submit">Back to List Categories</button>
    </form>
</body>
</html>
