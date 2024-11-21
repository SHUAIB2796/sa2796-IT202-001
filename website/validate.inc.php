<?php
require_once('database.php');
$emailAddress = filter_input(INPUT_POST, 'emailAddress', FILTER_SANITIZE_EMAIL);
if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
    echo "<h2>Invalid email format. Please enter a valid email.</h2>";
    echo "<a href=\"index.php\">Please try again</a>";
    exit();
}
$password = $_POST['password'];
$query = "SELECT firstName, lastName, emailAddress, pronouns FROM DragoManagers " .
        "WHERE emailAddress = ? AND password = SHA2(?,256)";
$conn = getDB();
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $emailAddress, $password);
$stmt->execute();
$stmt->bind_result($firstName, $lastName, $email, $pronouns);
$fetched = $stmt->fetch();

$name = "$firstName $lastName";

if ($fetched) {
   session_start();
   $_SESSION['login'] = true;
   $_SESSION['emailAddress'] = $email;
   $_SESSION['firstName'] = $firstName;
   $_SESSION['lastName'] = $lastName;
   $_SESSION['pronoun'] = $pronouns;
   $_SESSION['emailAddress'] = $user['emailAddress']; 
   header("Location: index.php");
   exit();
} else {
   echo "<h2>Sorry, login incorrect. Please try again at Drago Electronics Shop.</h2>\n";
   echo "<a href=\"index.php\">Please try again</a>\n";
}

/*
   Name: Shuaib Ali
   Date: September 24, 2024
   Course: IT202-001
   Assignment: Project Phase 01
   Email: sa2796@njit.edu
*/

?>
