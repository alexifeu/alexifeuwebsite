<?php
session_start();
$conn = mysqli_connect("localhost", "siteadmin", "2rTb$7wR#9mV1oB!", "alexifeuw");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
