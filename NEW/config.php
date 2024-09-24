<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "alexifeuw");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
