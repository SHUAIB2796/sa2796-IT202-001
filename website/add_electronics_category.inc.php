<?php
require_once 'electronics_category.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $categoryID = $_POST['categoryID'];
    $categoryCode = $_POST['categoryCode'];
    $categoryName = $_POST['categoryName'];
    $aisleNumber = $_POST['aisleNumber'];

   
    if (empty($categoryID) || empty($categoryCode) || empty($categoryName) || empty($aisleNumber)) {
        echo "Error: All fields are required.";
        exit();
    }

    
    if (empty($categoryID)) {
        echo "Error: Category ID cannot be empty.";
        exit();
    }

  
    if (!is_numeric($categoryID)) {
        echo "Error: Category ID must be numeric.";
        exit();
    }

    
    if (!is_numeric($aisleNumber)) {
        echo "Error: Aisle Number must be numeric.";
        exit();
    }

  
    $newCategory = new ElectronicsCategory();
    $newCategory->setCategoryID($categoryID);
    $newCategory->setCategoryCode($categoryCode);
    $newCategory->setCategoryName($categoryName);
    $newCategory->setAisleNumber($aisleNumber);

   
    if ($newCategory->save()) {
        echo "Category added successfully!";
    } else {
        echo "Error: Could not add the category.";
    }
} else {
    echo "Error: Invalid request.";
}
// Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796

include 'footer.inc.php';
?>
