<?php
function getDB() {
   $host = 'sql1.njit.edu';
   $port = 3306;
   $dbname = 'sa2796';
   $username = 'sa2796';
   $password = 'Nafee2005!$';
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   try {
       $db = new mysqli($host, $username, $password, $dbname, $port);
       if ($db->connect_error) {
        
        die("Connection failed: " . $db->connect_error);
    } else {
       
        error_log("You are connected to the $host database!");
        return $db;
    }
} catch (Exception $e) {
    
    error_log("Database connection failed: " . $e->getMessage(), 0);
    return null;
    }
}
// getDB();

/*
   Name: Shuaib Ali
   Date: September 24, 2024
   Course: IT202-001
   Assignment: Project Phase 01
   Email: sa2796@njit.edu
*/

?>
