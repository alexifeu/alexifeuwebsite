<?php
session_start();

require_once 'vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__)->load();

$db_host = $_ENV['DB_HOST'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];
$db_name = $_ENV['DB_NAME'];

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//install getcomposer
//composer require vlucas/phpdotenv