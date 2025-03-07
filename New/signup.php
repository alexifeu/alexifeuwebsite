<?php
require 'config.php';

if (isset($_POST["submit"])) {
  // Eingaben aus dem Formular abrufen
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];

  // Passwort verschlüsseln
  $pw_hashed = password_hash($password, PASSWORD_BCRYPT);

  // Überprüfen, ob Benutzername oder E-Mail bereits existieren
  $duplicateQuery = "SELECT * FROM users WHERE username = ? OR email = ?";
  $duplicateStmt = $conn->prepare($duplicateQuery);
  $duplicateStmt->bind_param("ss", $username, $email);
  $duplicateStmt->execute();
  $result = $duplicateStmt->get_result();

  if ($result->num_rows > 0) {
    echo "<script> alert('Username oder Email ist bereits vergeben!'); </script>";
  } else {
    // Überprüfen, ob die Passwörter übereinstimmen
    if ($password === $confirmpassword) {
      // Benutzer in die Datenbank einfügen
      $insertQuery = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)";
      $insertStmt = $conn->prepare($insertQuery);
      $insertStmt->bind_param("ssss", $name, $username, $email, $pw_hashed);
      $insertStmt->execute();
      $insertStmt->close();

      echo "<script> alert('Du bist jetzt registriert!'); </script>";
    } else {
      echo "<script> alert('Die Passwörter stimmen nicht überein!'); </script>";
    }
  }

  // Ressourcen schließen
  $duplicateStmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Signup to Alexifeu.com</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
</head>

<body class="loginbody">
  <?php require 'nav.php'; ?>
  <!--<video src="img/Wave.webm" autoplay loop></video>-->
  <h1>Signup</h1>
  <form method="post" action="" autocomplete="off">
    <input type="text" placeholder="Name" id="name" name="name" required />
    <input
      type="text"
      placeholder="Username"
      id="username"
      name="username"
      required />
    <input
      type="email"
      placeholder="EMail"
      id="email"
      name="email"
      required />
    <input
      type="password"
      placeholder="Choose Password"
      id="password"
      name="password"
      required />
    <input
      type="password"
      placeholder="Confirm Password"
      id="confirmpassword"
      name="confirmpassword"
      required />
    <p class="pass">Forgot Password?</p>
    <input type="submit" name="submit" value="Get Started" />
    <p>Already a member? <a class="login" href="/login">Login</a></p>
  </form>
</body>

</html>