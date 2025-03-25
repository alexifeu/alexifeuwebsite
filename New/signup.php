<?php
require 'config.php';

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];

  if (strlen($password) < 4 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
    echo "<h3 class='alert'>Password must contain at least 4 characters, one uppercase letter and one number.</h3>";
  }

  $pw_hashed = password_hash($password, PASSWORD_BCRYPT);


  $duplicateQuery = "SELECT * FROM users WHERE username = ? OR email = ?";
  $duplicateStmt = $conn->prepare($duplicateQuery);
  $duplicateStmt->bind_param("ss", $username, $email);
  $duplicateStmt->execute();
  $duplicateResult = $duplicateStmt->get_result();


  if ($duplicateResult->num_rows > 0) {
    $duplicateRow = $duplicateResult->fetch_assoc();
    if ($duplicateRow['username'] == $username) {
      echo "<h3 class='alert'>This username is already taken.</h3>";
    } elseif ($duplicateRow['email'] == $email) {
      echo "<h3 class='alert'>This email is already registered.</h3>";
    }
  } else {

    if ($password === $confirmpassword) {
      $insertQuery = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)";
      $insertStmt = $conn->prepare($insertQuery);
      $insertStmt->bind_param("ssss", $name, $username, $email, $pw_hashed);
      $insertStmt->execute();
      $insertStmt->close();

      echo "<h3 class='alert'>You have successfully registered! Please proceed to login.</h3>";
    } else {
      echo "<h3 class='alert'>Passwords don't match.</h3>";
    }
  }

  $duplicateStmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Sign up for Alexifeu to join the community and get access to exclusive content, features, and updates." />
  <meta name="keywords" content="signup, create account, join Alexifeu, exclusive content, sign up for Alexifeu" />
  <meta property="og:title" content="Sign Up - Alexifeu" />
  <meta property="og:description" content="Become a part of Alexifeu by signing up for an account today. Get access to exclusive content and enjoy a personalized experience." />
  <meta property="og:image" content="path/to/image.jpg" />
  <link rel="stylesheet" href="style.css" />
  <title>Signup to Alexifeu.com</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
</head>

<body class="loginbody">
  <?php require 'nav.php'; ?>
  <!--<video src="img/Wave.webm" autoplay loop></video>-->
  <div class="wave-container">
    <svg viewBox="0 0 1000 200" preserveAspectRatio="none" style="width: 100%; height: 100%;">
      <path
        d="M0,200 L0.0,100.0 C 6.3,102.8 18.8,108.3 25.0,111.0 C 31.3,113.3 43.8,118.1 50.0,120.4 C 56.3,122.1 68.8,125.4 75.0,127.1 C 81.3,127.8 93.8,129.2 100.0,129.9 C 106.3,129.6 118.8,128.9 125.0,128.6 C 131.3,127.3 143.8,124.6 150.0,123.3 C 156.3,121.2 168.8,116.9 175.0,114.8 C 181.3,112.2 193.8,106.8 200.0,104.2 C 206.3,101.4 218.8,95.9 225.0,93.1 C 231.3,90.5 243.8,85.5 250.0,82.9 C 256.3,80.9 268.8,77.0 275.0,75.0 C 281.3,73.9 293.8,71.8 300.0,70.7 C 306.3,70.6 318.8,70.5 325.0,70.4 C 331.3,71.4 343.8,73.3 350.0,74.2 C 356.3,76.0 368.8,79.8 375.0,81.6 C 381.3,84.1 393.8,89.1 400.0,91.6 C 406.3,94.4 418.8,100.0 425.0,102.8 C 431.3,105.5 443.8,110.8 450.0,113.5 C 456.3,115.7 468.8,120.2 475.0,122.4 C 481.3,123.8 493.8,126.7 500.0,128.1 C 506.3,128.6 518.8,129.5 525.0,130.0 C 531.3,129.4 543.8,128.3 550.0,127.7 C 556.3,126.2 568.8,123.0 575.0,121.5 C 581.3,119.2 593.8,114.7 600.0,112.4 C 606.3,109.7 618.8,104.2 625.0,101.5 C 631.3,98.7 643.8,93.2 650.0,90.4 C 656.3,88.0 668.8,83.1 675.0,80.7 C 681.3,78.9 693.8,75.4 700.0,73.6 C 706.3,72.8 718.8,71.0 725.0,70.2 C 731.3,70.4 743.8,70.8 750.0,71.0 C 756.3,72.2 768.8,74.5 775.0,75.7 C 781.3,77.8 793.8,81.9 800.0,83.9 C 806.3,86.5 818.8,91.7 825.0,94.3 C 831.3,97.1 843.8,102.7 850.0,105.5 C 856.3,108.1 868.8,113.3 875.0,115.9 C 881.3,118.0 893.8,122.0 900.0,124.1 C 906.3,125.3 918.8,127.8 925.0,129.0 C 931.3,129.2 943.8,129.6 950.0,129.8 C 956.3,129.0 968.8,127.3 975.0,126.5 C 981.3,124.8 993.8,121.3 1000.0,119.5 C 1006.3,117.1 1018.8,112.2 1025.0,109.8 L1000.0,200.0 L0,200.0Z"
        fill="#570fd1">
        <animate
          attributeName="d"
          dur="7.0s"
          repeatCount="indefinite"
          values="M0,200 L0.0,100.0 C 6.3,102.8 18.8,108.3 25.0,111.0 C 31.3,113.3 43.8,118.1 50.0,120.4 C 56.3,122.1 68.8,125.4 75.0,127.1 C 81.3,127.8 93.8,129.2 100.0,129.9 C 106.3,129.6 118.8,128.9 125.0,128.6 C 131.3,127.3 143.8,124.6 150.0,123.3 C 156.3,121.2 168.8,116.9 175.0,114.8 C 181.3,112.2 193.8,106.8 200.0,104.2 C 206.3,101.4 218.8,95.9 225.0,93.1 C 231.3,90.5 243.8,85.5 250.0,82.9 C 256.3,80.9 268.8,77.0 275.0,75.0 C 281.3,73.9 293.8,71.8 300.0,70.7 C 306.3,70.6 318.8,70.5 325.0,70.4 C 331.3,71.4 343.8,73.3 350.0,74.2 C 356.3,76.0 368.8,79.8 375.0,81.6 C 381.3,84.1 393.8,89.1 400.0,91.6 C 406.3,94.4 418.8,100.0 425.0,102.8 C 431.3,105.5 443.8,110.8 450.0,113.5 C 456.3,115.7 468.8,120.2 475.0,122.4 C 481.3,123.8 493.8,126.7 500.0,128.1 C 506.3,128.6 518.8,129.5 525.0,130.0 C 531.3,129.4 543.8,128.3 550.0,127.7 C 556.3,126.2 568.8,123.0 575.0,121.5 C 581.3,119.2 593.8,114.7 600.0,112.4 C 606.3,109.7 618.8,104.2 625.0,101.5 C 631.3,98.7 643.8,93.2 650.0,90.4 C 656.3,88.0 668.8,83.1 675.0,80.7 C 681.3,78.9 693.8,75.4 700.0,73.6 C 706.3,72.8 718.8,71.0 725.0,70.2 C 731.3,70.4 743.8,70.8 750.0,71.0 C 756.3,72.2 768.8,74.5 775.0,75.7 C 781.3,77.8 793.8,81.9 800.0,83.9 C 806.3,86.5 818.8,91.7 825.0,94.3 C 831.3,97.1 843.8,102.7 850.0,105.5 C 856.3,108.1 868.8,113.3 875.0,115.9 C 881.3,118.0 893.8,122.0 900.0,124.1 C 906.3,125.3 918.8,127.8 925.0,129.0 C 931.3,129.2 943.8,129.6 950.0,129.8 C 956.3,129.0 968.8,127.3 975.0,126.5 C 981.3,124.8 993.8,121.3 1000.0,119.5 C 1006.3,117.1 1018.8,112.2 1025.0,109.8 L1000.0,200.0 L0,200.0Z;
       M0,200 L0.0,100.0 C 6.3,97.3 18.8,91.8 25.0,89.0 C 31.3,86.7 43.8,81.9 50.0,79.6 C 56.3,77.9 68.8,74.6 75.0,72.9 C 81.3,72.2 93.8,70.8 100.0,70.1 C 106.3,70.4 118.8,71.1 125.0,71.4 C 131.3,72.7 143.8,75.4 150.0,76.7 C 156.3,78.8 168.8,83.1 175.0,85.2 C 181.3,87.8 193.8,93.2 200.0,95.8 C 206.3,98.6 218.8,104.1 225.0,106.9 C 231.3,109.5 243.8,114.5 250.0,117.1 C 256.3,119.1 268.8,123.0 275.0,125.0 C 281.3,126.1 293.8,128.2 300.0,129.3 C 306.3,129.4 318.8,129.5 325.0,129.6 C 331.3,128.7 343.8,126.8 350.0,125.8 C 356.3,124.0 368.8,120.3 375.0,118.4 C 381.3,115.9 393.8,110.9 400.0,108.4 C 406.3,105.6 418.8,100.0 425.0,97.2 C 431.3,94.5 443.8,89.2 450.0,86.5 C 456.3,84.3 468.8,79.8 475.0,77.6 C 481.3,76.2 493.8,73.3 500.0,71.9 C 506.3,71.4 518.8,70.5 525.0,70.0 C 531.3,70.6 543.8,71.7 550.0,72.3 C 556.3,73.8 568.8,77.0 575.0,78.5 C 581.3,80.8 593.8,85.3 600.0,87.6 C 606.3,90.3 618.8,95.8 625.0,98.5 C 631.3,101.3 643.8,106.8 650.0,109.6 C 656.3,112.0 668.8,116.9 675.0,119.3 C 681.3,121.1 693.8,124.6 700.0,126.4 C 706.3,127.3 718.8,129.0 725.0,129.8 C 731.3,129.6 743.8,129.2 750.0,129.0 C 756.3,127.8 768.8,125.5 775.0,124.3 C 781.3,122.3 793.8,118.1 800.0,116.1 C 806.3,113.5 818.8,108.3 825.0,105.7 C 831.3,102.9 843.8,97.3 850.0,94.5 C 856.3,91.9 868.8,86.7 875.0,84.1 C 881.3,82.0 893.8,78.0 900.0,75.9 C 906.3,74.7 918.8,72.2 925.0,71.0 C 931.3,70.8 943.8,70.4 950.0,70.2 C 956.3,71.0 968.8,72.7 975.0,73.5 C 981.3,75.3 993.8,78.8 1000.0,80.5 C 1006.3,82.9 1018.8,87.8 1025.0,90.2 L1000.0,200.0 L0,200.0Z;
       M0,200 L0.0,100.0 C 6.3,102.8 18.8,108.3 25.0,111.0 C 31.3,113.3 43.8,118.1 50.0,120.4 C 56.3,122.1 68.8,125.4 75.0,127.1 C 81.3,127.8 93.8,129.2 100.0,129.9 C 106.3,129.6 118.8,128.9 125.0,128.6 C 131.3,127.3 143.8,124.6 150.0,123.3 C 156.3,121.2 168.8,116.9 175.0,114.8 C 181.3,112.2 193.8,106.8 200.0,104.2 C 206.3,101.4 218.8,95.9 225.0,93.1 C 231.3,90.5 243.8,85.5 250.0,82.9 C 256.3,80.9 268.8,77.0 275.0,75.0 C 281.3,73.9 293.8,71.8 300.0,70.7 C 306.3,70.6 318.8,70.5 325.0,70.4 C 331.3,71.4 343.8,73.3 350.0,74.2 C 356.3,76.0 368.8,79.8 375.0,81.6 C 381.3,84.1 393.8,89.1 400.0,91.6 C 406.3,94.4 418.8,100.0 425.0,102.8 C 431.3,105.5 443.8,110.8 450.0,113.5 C 456.3,115.7 468.8,120.2 475.0,122.4 C 481.3,123.8 493.8,126.7 500.0,128.1 C 506.3,128.6 518.8,129.5 525.0,130.0 C 531.3,129.4 543.8,128.3 550.0,127.7 C 556.3,126.2 568.8,123.0 575.0,121.5 C 581.3,119.2 593.8,114.7 600.0,112.4 C 606.3,109.7 618.8,104.2 625.0,101.5 C 631.3,98.7 643.8,93.2 650.0,90.4 C 656.3,88.0 668.8,83.1 675.0,80.7 C 681.3,78.9 693.8,75.4 700.0,73.6 C 706.3,72.8 718.8,71.0 725.0,70.2 C 731.3,70.4 743.8,70.8 750.0,71.0 C 756.3,72.2 768.8,74.5 775.0,75.7 C 781.3,77.8 793.8,81.9 800.0,83.9 C 806.3,86.5 818.8,91.7 825.0,94.3 C 831.3,97.1 843.8,102.7 850.0,105.5 C 856.3,108.1 868.8,113.3 875.0,115.9 C 881.3,118.0 893.8,122.0 900.0,124.1 C 906.3,125.3 918.8,127.8 925.0,129.0 C 931.3,129.2 943.8,129.6 950.0,129.8 C 956.3,129.0 968.8,127.3 975.0,126.5 C 981.3,124.8 993.8,121.3 1000.0,119.5 C 1006.3,117.1 1018.8,112.2 1025.0,109.8 L1000.0,200.0 L0,200.0Z" />
      </path>
    </svg>
  </div>
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
      required /><br />
    <label>
      I agree to the <a class="legal" href="/privacy" target="_blank">terms and conditions</a>
      <input type="checkbox" id="termsCheckbox" required>
    </label>
    <p class="pass">Forgot Password?</p>
    <input type="submit" name="submit" value="Get Started" />
    <p>Already a member? <a class="login" href="/login">Login</a></p>
  </form>
</body>

</html>