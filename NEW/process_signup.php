<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Username or Email Has Already Been Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO users VALUES('','$name', '$username', '$email', '$password')";
            mysqli_query($conn, $query);
            echo "Yey ur now registered m8!";
        } else {
            echo "U wot m8? wrong password";
        }
    }
}
