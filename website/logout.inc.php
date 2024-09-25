<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: index.php");
exit();

/*
   Name: Shuaib Ali
   Date: September 24, 2024
   Course: IT202-001
   Assignment: Project Phase 01
   Email: sa2796@njit.edu
*/
?>


