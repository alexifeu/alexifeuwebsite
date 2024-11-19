<?php
<<<<<<< HEAD:New/login.php


require 'config.php';
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {
=======
require 'config.php';
#var_dump($_POST);
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
  if ($row = mysqli_fetch_assoc($result)) {
>>>>>>> 4322b8a19c88d5007a08f490a6d0632e40c62fdb:NEW/login.php
    if (password_verify($password, $row['password'])) {
      $_SESSION['login'] = true;
      $_SESSION['id'] = $row['id'];
      echo "Yey ur now logged in m8!";
      header('Location: Index.html');
      exit;
<<<<<<< HEAD:New/login.php
    } else {
      echo "Incorrect password.";
    }
  } else {
    echo "Username not found.";
  }

  $stmt->close();
=======
    }
  }
>>>>>>> 4322b8a19c88d5007a08f490a6d0632e40c62fdb:NEW/login.php
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
    <a class="fill" href="signup.php"><svg
        class="fill"
        xmlns="http://www.w3.org/2000/svg"
        height="48px"
        viewBox="0 -960 960 960"
        width="48px"
        fill="#e8eaed">
        <path
          d="M481-120v-60h299v-600H481v-60h299q24 0 42 18t18 42v600q0 24-18 42t-42 18H481Zm-55-185-43-43 102-102H120v-60h363L381-612l43-43 176 176-174 174Z" />
      </svg>
      Signup
    </a>
  </nav>
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