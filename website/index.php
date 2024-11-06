<?php
session_start();
date_default_timezone_set('America/New_York');
require_once 'database.php';

// Shuaib Ali, 10-23-24, IT202-001 Phase 03 Assignment Email: sa2796@njit.edu UCID: sa2796
// Shuaib Ali, 11-05-24, IT202-001 Phase 04 Assignment Email: sa2796@njit.edu UCID: sa2796


if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = isset($_POST['emailAddress']) ? trim($_POST['emailAddress']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if (!empty($email) && !empty($password)) {
            $db = getDB();
            if ($db) {
                $sql = "SELECT * FROM DragoManagers WHERE emailAddress = ? AND password = SHA2(?, 256)";
                $stmt = $db->prepare($sql);
                $stmt->bind_param('ss', $email, $password);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    $_SESSION['login'] = true;
                    $_SESSION['firstName'] = $user['firstName'];
                    $_SESSION['lastName'] = $user['lastName'];
                    $_SESSION['pronoun'] = $user['pronouns'];
                    header('location: index.php'); 
                    exit();
                } else {
                    $loginError = "Invalid login credentials. Please try again.";
                }

                $stmt->close();
            }
            $db->close();
        } else {
            $loginError = "Please enter both email and password.";
        }
    }

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Login</title>
    </head>
    <body>
        <h2>Please Login to the Drago Electronics Shop Inventory Website</h2>
        <form method="post" action="index.php">
            <label>Email:</label>
            <input type="text" name="emailAddress" size="20" required><br>
            <label>Password:</label>
            <input type="password" name="password" size="20" required><br>
            <input type="submit" value="Login">
        </form>
        <?php if (isset($loginError)) echo "<p style='color:red;'>$loginError</p>"; 
        include 'footer.inc.php';
        ?>
    </body>
    </html>
    <?php
    exit(); 
}

$content = isset($_REQUEST['content']) ? $_REQUEST['content'] : 'main';

include 'header.inc.php';
include 'nav.inc.php';

if ($content == 'logout') {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Helper</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section id="container">
        <main>
            <?php
            if ($content == 'new_electronics_category') {
                include 'new_electronics_category.inc.php';
            } elseif ($content == 'list_electronics_categories') {
                include 'list_electronics_categories.inc.php';
            } elseif ($content == 'add_electronics_product') {
                include 'add_electronics_product.inc.php';
            } elseif ($content == 'list_electronics_products') {
                include 'list_electronics_products.inc.php';
            } elseif ($content == 'update_electronics_product') {
                include 'update_electronics_product.inc.php';
            } elseif ($content == 'display_electronics_category') {
                include 'display_electronics_category.inc.php';
            } else {
                include 'main.inc.php'; 
            }
            ?>
        </main>
    </section>
    <?php include 'footer.inc.php'; ?>
</body>
</html>
