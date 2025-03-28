<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Learn more about Alexifeu and the creative mind behind it – Alexander Rankl. Discover the story, values, and mission.">
  <meta name="keywords" content="about Alexifeu, Alexander Rankl, about the creator, website story, mission">
  <meta property="og:title" content="About Alexifeu - The Story Behind the Website">
  <meta property="og:description" content="Get to know the vision and values of Alexifeu, founded by Alexander Rankl. Learn what makes this site unique.">
  <meta property="og:image" content="path/to/image.jpg">
  <link rel="stylesheet" href="style.css">
  <title>About Us</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>
  <?php require 'nav.php'; ?>
  <h1>About Us</h1>
  <main class="textcontainer">
    <h2>Welcome to Alexifeu</h2>
    <p>The ultimate hub for gaming, memes, epic moments
      and everything that makes the internet awesome!</p>
    <h2>Our Mission</h2>
    <p>We aim to bring fun, creativity, and nostalgia together in one place,
      celebrating the best of internet culture in all its forms.</p>
    <h2>Who We Are</h2>
    <p>Founded by <strong>Alexander Rankl</strong>, Alexifeu is a passion project dedicated to
      internet enthusiasts who love gaming, memes, and online culture.</p>
    <h2>Licensing & Copyright</h2>
    <a href="http://www.wtfpl.net/" target="_blank">
      <img src="img/wtfpl.png" alt="WTFPL" width="50">
    </a>
    <p><strong>Copyright &copy; 2025 Alexander Rankl </strong><a class="legal" href="mailto:alexifeu@aol.com">alexifeu@aol.com</a></p>
    <p>
      This work is <strong>free</strong>. You can redistribute it and/or modify it under the terms of
      the <strong><a class="legal" href="http://www.wtfpl.net/">Do What The Fuck You Want To Public License, Version 2 (WTFPL)</a></strong>,
      published by Sam Hocevar.
    </p>
    <p>
      All product images, names, logos, and brands used on this website are the property of their respective owners.
      If you are a copyright holder and believe an image is being used inappropriately, please <a class="legal" href="/contact">contact me</a>
      to discuss the matter.
    </p>
  </main>
  <?php include('footer.php'); ?>
</body>

</html>