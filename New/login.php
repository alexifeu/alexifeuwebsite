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
      echo "<script> alert('Du bist jetzt eingeloggt!'); </script>";
      header("Location: profile.php");
    } else {
      echo "<script> alert('Falsches Passwort!'); </script>";
    }
  } else {
    echo "<script> alert('Benutzername existiert nicht!'); </script>";
  }

  $query->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Login to Alexifeu.com</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
</head>

<body class="loginbody">
  <?php require 'nav.php'; ?>
  <h1>Login</h1>
  <form method="post" action="" autocomplete="off">
    <input type="text" name="username" id="username" placeholder="Username" required />
    <input type="password" name="password" id="password" placeholder="Password" required />
    <p class="pass">Forgot Password?</p>
    <input type="submit" name="submit" value="Login" />
    <p>Not a member? <a class="login" href="signup.php">Signup</a></p>
  </form>
</body>

</html>