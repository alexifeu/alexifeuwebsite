<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "alexifeuw");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
