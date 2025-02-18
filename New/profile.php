<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Alexifeu</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
</head>

<body>
    <?php
    require 'nav.php';
    if (isset($_SESSION['user_id'])) {
        $username = $_SESSION['username'];
        echo "<h1>Welcome, " . htmlspecialchars($username) . "!<h1>";
    } else {
        echo "<p>You are not logged in. <a href='login.php'>Login here</a></p>";
    }
    echo "<form action='' method='post'>
    <button type='submit' name='logout'>Logout</button>
    </form>";

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
    ?>

</html>