<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['id'];
            header('Location: Index.html');
        } else {
            echo 'Wrong Password';
        }
    }
} else {
    echo 'User not found';
}
