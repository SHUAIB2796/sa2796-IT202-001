<?php
require_once 'electronics_category.php';

//Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796


$categories = ElectronicsCategory::getAllCategories();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryID = isset($_POST['categoryID']) ? $_POST['categoryID'] : '';

    
    if (empty($categoryID)) {
        echo "<h2>Error: Category ID cannot be empty.</h2>";
    }
   
    elseif (!is_numeric($categoryID)) {
        echo "<h2>Error: Category ID must be numeric.</h2>";
    }
    else {
       
        $category = ElectronicsCategory::getCategoryByID($categoryID);

       
        if (!$category) {
            echo "<h2>Error: No category found with that ID.</h2>";
        } 
        else {
           
            echo "<h2>Category Details</h2>";
            echo "<p><strong>ID:</strong> " . $category['ElectronicsCategoryID'] . "</p>";
            echo "<p><strong>Code:</strong> " . $category['ElectronicsCategoryCode'] . "</p>";
            echo "<p><strong>Name:</strong> " . $category['ElectronicsCategoryName'] . "</p>";
            echo "<p><strong>Aisle Number:</strong> " . $category['AisleNumber'] . "</p>";
        }
    }
}
?>


<form method="POST" action="index.php?content=list_electronics_categories">
    <label for="categoryID">Enter Category ID to Find:</label>
    <input type="text" name="categoryID" id="categoryID">
    <button type="submit">Find</button>
</form>


<ul>
    <?php foreach ($categories as $category): ?>
        <li>
            <?php 
            echo "ID: " . $category['ElectronicsCategoryID'] . 
                 " - Code: " . $category['ElectronicsCategoryCode'] . 
                 " - Name: " . $category['ElectronicsCategoryName'] . 
                 " - Aisle: " . $category['AisleNumber'];
            ?>
        </li>
    <?php endforeach; ?>
</ul>
