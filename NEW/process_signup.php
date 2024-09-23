<?php
// Validate form input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    if (empty($username) || empty($password) || empty($confirm_password)) {
        // Handle empty fields
        echo "Please fill in all required fields.";
    } elseif ($password !== $confirm_password) {
        // Handle password mismatch
        echo "Passwords do not match.";
    } else {
        // Process sign-up (e.g., store user data in a database)
        // Replace with your actual database logic
        echo "Sign-up successful!";
        $query = "INSERT INTO users VALUES('','$name','$username','$password')";
        mysqli_query($conn,$query);
    }
}
?>