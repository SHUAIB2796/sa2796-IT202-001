<?php
require_once 'electronics_category.php';

// Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796
// Shuaib Ali, 11-21-24, IT202-001 Phase 05 Assignment Email: sa2796@njit.edu UCID: sa2796

$categories = ElectronicsCategory::getAllCategories();
$foundCategory = null; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['categoryID'])) {
        $categoryID = $_POST['categoryID'];

        if (empty($categoryID)) {
            echo "<h2>Error: Category ID cannot be empty.</h2>";
        } elseif (!is_numeric($categoryID)) {
            echo "<h2>Error: Category ID must be numeric.</h2>";
        } else {
            $foundCategory = ElectronicsCategory::getCategoryByID($categoryID);

            if (!$foundCategory) {
                echo "<h2>Error: No category found with that ID.</h2>";
            }
        }
    }

    if (isset($_POST['deleteCategoryID'])) {
        $deleteCategoryID = $_POST['deleteCategoryID'];

        if (empty($deleteCategoryID)) {
            echo "<h2>Error: Category ID cannot be empty.</h2>";
        } elseif (!is_numeric($deleteCategoryID)) {
            echo "<h2>Error: Category ID must be numeric.</h2>";
        } else {
            $category = new ElectronicsCategory();
            $result = $category->delete($deleteCategoryID);

            if ($result) {
                echo "<h2>Category ID $deleteCategoryID deleted successfully!</h2>";
            }
            $categories = ElectronicsCategory::getAllCategories();
        }
    }
}
?>

<h2>Website Summary</h2>
<div id="summary">
    <p>Category Count: <span id="categoryCount">Loading...</span></p>
    <p>Product Count: <span id="productCount">Loading...</span></p>
    <p>Wholesale Price Total: $<span id="wholesaleTotal">Loading...</span></p>
    <p>List Price Total: $<span id="listTotal">Loading...</span></p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    fetch('fetch_summary_data.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error fetching summary data:', data.error);
            } else {
                document.getElementById('categoryCount').textContent = data.categoryCount;
                document.getElementById('productCount').textContent = data.productCount;
                document.getElementById('wholesaleTotal').textContent = data.wholesaleTotal;
                document.getElementById('listTotal').textContent = data.listTotal;
            }
        })
        .catch(error => console.error('Error fetching summary data:', error));
});

</script>

<form method="POST" action="index.php?content=list_electronics_categories">
    <label for="categoryID">Enter Category ID to Find:</label>
    <input type="text" name="categoryID" id="categoryID">
    <button type="submit">Find</button>
</form>

<?php if ($foundCategory): ?>
    <h2>Category Details</h2>
    <p><strong>ID:</strong> <?= $foundCategory['ElectronicsCategoryID'] ?></p>
    <p><strong>Code:</strong> <?= $foundCategory['ElectronicsCategoryCode'] ?></p>
    <p><strong>Name:</strong> <?= $foundCategory['ElectronicsCategoryName'] ?></p>
    <p><strong>Aisle Number:</strong> <?= $foundCategory['AisleNumber'] ?></p>
<?php endif; ?>

<h2>Category List</h2>
<ul>
    <?php foreach ($categories as $category): ?>
        <li>
            <?= "ID: " . $category['ElectronicsCategoryID'] .
                " - Code: " . $category['ElectronicsCategoryCode'] .
                " - Name: " . $category['ElectronicsCategoryName'] .
                " - Aisle: " . $category['AisleNumber'] ?>
            <form method="POST" action="index.php?content=list_electronics_categories" style="display:inline;">
                <input type="hidden" name="deleteCategoryID" value="<?= $category['ElectronicsCategoryID'] ?>">
                <button type="submit" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
            </form>
        </li>
        <form method="GET" action="edit_category_form.php" style="display:inline;">
    <input type="hidden" name="categoryID" value="<?= $category['ElectronicsCategoryID'] ?>">
    <input type="hidden" name="categoryCode" value="<?= $category['ElectronicsCategoryCode'] ?>">
    <input type="hidden" name="categoryName" value="<?= $category['ElectronicsCategoryName'] ?>">
    <input type="hidden" name="aisleNumber" value="<?= $category['AisleNumber'] ?>">
    <button type="submit">Edit</button>
</form>

    <?php endforeach; ?>
</ul>
