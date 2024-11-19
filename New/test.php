<?php

$conn = new mysqli('localhost', 'phpmyadmin', 'password', 'test');

if ($conn->connect_error) {
    die("Error connecting");
} else {
    echo 'Connection succesful';
}

$sql = "SHOW TABLES;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        echo '<ul>' . $row[0] . '</ul>';
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css" />
    <title>Document</title>
</head>

<body>

</body>

</html>
<section class="dark">
    <h2>Dark</h2>
    <p>This section will be dark due to the <code>color-scheme: dark;</code>.</p>
</section>