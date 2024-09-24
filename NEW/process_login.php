<?php
// Validate form input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace with your actual database logic to fetch user data
    $user = getUserData($username);

    // Check if user exists and password matches
    if ($user && password_verify($password, $user['password'])) {
        // Successful login (e.g., start a session)
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php'); // Redirect to dashboard
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }
}
