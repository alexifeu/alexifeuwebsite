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
  <nav class="navbar">
    <a class="fill" href="index.html"><svg
        class="fill"
        xmlns="http://www.w3.org/2000/svg"
        height="48px"
        viewBox="0 -960 960 960"
        width="48px"
        fill="#e8eaed">
        <path
          d="M220-180h150v-250h220v250h150v-390L480-765 220-570v390Zm-60 60v-480l320-240 320 240v480H530v-250H430v250H160Zm320-353Z" />
      </svg>
      Home
    </a>
    <a class="fill" href="contact.html"><svg
        class="fill"
        xmlns="http://www.w3.org/2000/svg"
        height="48px"
        viewBox="0 -960 960 960"
        width="48px"
        fill="#e8eaed">
        <path
          d="M140-160q-24 0-42-18t-18-42v-520q0-24 18-42t42-18h680q24 0 42 18t18 42v520q0 24-18 42t-42 18H140Zm340-302L140-685v465h680v-465L480-462Zm0-60 336-218H145l335 218ZM140-685v-55 520-465Z" />
      </svg>
      Contact
    </a>
    <a class="fill" href="about.html"><svg
        class="fill"
        xmlns="http://www.w3.org/2000/svg"
        height="48px"
        viewBox="0 -960 960 960"
        width="48px"
        fill="#e8eaed">
        <path
          d="M453-280h60v-240h-60v240Zm26.98-314q14.02 0 23.52-9.2T513-626q0-14.45-9.48-24.22-9.48-9.78-23.5-9.78t-23.52 9.78Q447-640.45 447-626q0 13.6 9.48 22.8 9.48 9.2 23.5 9.2Zm.29 514q-82.74 0-155.5-31.5Q252-143 197.5-197.5t-86-127.34Q80-397.68 80-480.5t31.5-155.66Q143-709 197.5-763t127.34-85.5Q397.68-880 480.5-880t155.66 31.5Q709-817 763-763t85.5 127Q880-563 880-480.27q0 82.74-31.5 155.5Q817-252 763-197.68q-54 54.31-127 86Q563-80 480.27-80Zm.23-60Q622-140 721-239.5t99-241Q820-622 721.19-721T480-820q-141 0-240.5 98.81T140-480q0 141 99.5 240.5t241 99.5Zm-.5-340Z" />
      </svg>
      About
    </a>
    <a class="fill" href="login.php"><svg
        class="fill"
        xmlns="http://www.w3.org/2000/svg"
        height="48px"
        viewBox="0 -960 960 960"
        width="48px"
        fill="#e8eaed">
        <path
          d="M481-120v-60h299v-600H481v-60h299q24 0 42 18t18 42v600q0 24-18 42t-42 18H481Zm-55-185-43-43 102-102H120v-60h363L381-612l43-43 176 176-174 174Z" />
      </svg>
      Login
    </a>
  </nav>
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
    <p>Already a member? <a class="login" href="login.php">Login</a></p>
  </form>
</body>

</html>