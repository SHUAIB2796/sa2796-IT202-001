<?php
// Shuaib Ali, 11-21-24, IT202-001 Phase 05 Assignment Email: sa2796@njit.edu UCID: sa2796

require_once 'electronics_category.php'; 

header('Content-Type: application/json'); 

try {
    $category = new ElectronicsCategory(); 
    $summary = $category->getSummaryData(); 

    echo json_encode($summary); 
} catch (Exception $e) {
   
    echo json_encode(['error' => $e->getMessage()]);
}