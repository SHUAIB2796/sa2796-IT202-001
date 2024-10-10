<?php
require 'electronics_category.php'; 

$category1 = new ElectronicsCategory('SMART', 'Smartphones', 10);
$category1->save();

$category2 = new ElectronicsCategory('LAPT', 'Laptops', 5);
$category2->save();

$category3 = new ElectronicsCategory('SMRTW', 'Smartwatches', 7);
$category3->save();

$category4 = new ElectronicsCategory('HDPH', 'Headphones', 3);
$category4->save();

$category5 = new ElectronicsCategory('DGCAM', 'Digital Cameras', 9);
$category5->save();

// Shuaib Ali, 10-10-24, IT202-001 Phase 02 Assignment Email: sa2796@njit.edu UCID: sa2796

echo "All categories added successfully!";
?>
