<?php
if (!isset($_SESSION['login'])) {
?>
  <h2>Please Login to the Drago Electronics Shop Inventory Website</h2><br>
  <form name="login" action="validate.inc.php" method="post">
    <label>Email:</label>
    <input type="text" name="emailAddress" size="20" required>
    <br>
    <br>
    <label>Password</label>
    <input type="password" name="password" size="20" required>
    <br>
    <br>
    <input type="submit" value="Login">
  </form> 
  <?php
} else {
   echo "<h2>Welcome to Drago Electronics Shop Inventory, {$_SESSION['firstName']} {$_SESSION['lastName']} ({$_SESSION['pronoun']})</h2>";
?>
   <br><br>
   <p>This program tracks category and item inventory</p>
   <p>Please use the links in the navigation window</p>
   <p>Please DO NOT use the browser navigation buttons!</p>
   <a href="logout.inc.php"><strong>Logout</strong></a>
<?php
}
?>
