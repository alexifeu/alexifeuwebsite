<?php
session_start();

// Load environment variables using Dotenv
require_once 'vendor/autoload.php';

// Load the .env file
Dotenv\Dotenv::createImmutable(__DIR__)->load();

// Retrieve the database credentials from the environment variables
$db_host = $_ENV['DB_HOST'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];
$db_name = $_ENV['DB_NAME'];

// Output for debugging purposes
echo "DB Host: " . $db_host . "<br>";
echo "DB User: " . $db_user . "<br>";
echo "DB Pass: " . $db_pass . "<br>";  // Don't expose this in a live system!
echo "DB Name: " . $db_name . "<br>";

// Connect to MySQL database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



//install getcomposer
// composer require vlucas/phpdotenv
