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
        $user_id = $_SESSION['user_id'];

        $stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($name, $email);
        $stmt->fetch();
        $stmt->close();
        echo '<section>';
        echo "<h1>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
        echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
        echo '</section>';

        echo "<form action='' method='post'>
            <button type='submit' name='logout'>Logout</button>
        </form>";

        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            exit();
        }
    } else {
        echo "<h2 class='alert'>You are logged out!</h2>";
    }
    ?>
</body>

</html>