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
