<?php
session_start();
$conn = mysqli_connect("localhost", "siteadmin", "password", "alexifeuw");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
