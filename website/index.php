<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    $content = 'main';
} else {
    $content = isset($_REQUEST['content']) ? $_REQUEST['content'] : 'main';
}
?>
<!DOCTYPE html>
<html>
<head><title>Inventory Helper</title></head>
<body>
   <section id="container">

       <main>
           <?php
           include($content . ".inc.php");
           ?>
       </main>
   </section>
</body>
</html>

<!--
   Name: Shuaib Ali
   Date: September 24, 2024
   Course: IT202-001
   Assignment: Project Phase 01
   Email: sa2796@njit.edu
-->