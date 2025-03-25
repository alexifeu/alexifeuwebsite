<?php
require 'config.php';
if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $query->bind_param("s", $username);
  $query->execute();
  $result = $query->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      header("Location: profile.php");
      exit;
    } else {
      echo "<h3 class=alert>Wrong Password</h3>";
    }
  } else {
    echo "<h2 class=alert>Username doesn't exist!</h2>";
  }

  $query->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Log in to your Alexifeu account to access exclusive content, features, and personalized experiences.">
  <meta name="keywords" content="login, Alexifeu login, user account, exclusive content, personalized features">
  <meta property="og:title" content="Login - Alexifeu">
  <meta property="og:description" content="Access your Alexifeu account by logging in. Unlock exclusive content and features by signing into your profile.">
  <meta property="og:image" content="path/to/image.jpg">
  <link rel="stylesheet" href="style.css">
  <title>Login to Alexifeu.com</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body class="loginbody">
  <?php require 'nav.php'; ?>
  <h1>Login</h1>
  <form method="post" action="" autocomplete="off">
    <input type="text" name="username" id="username" placeholder="Username" required>
    <input type="password" name="password" id="password" placeholder="Password" required>
    <p class="pass">Forgot Password?</p>
    <input type="submit" name="submit" value="Login">
    <p>Not a member? <a class="login" href="/signup">Signup</a></p>
  </form>
</body>

</html>