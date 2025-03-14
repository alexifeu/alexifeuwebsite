<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Error 404 Not Found!!1</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
</head>

<body>
  <?php require 'nav.php'; ?>

  <h1 class="mlg">
    404 <br />
    page not found m8
  </h1>
  <h1>Sorry, the page you are looking for is not available.</h1>
  <h1>
    <a href="/index" class="rainbow">Home</a>
    <a href="/sitemap" class="rainbow">Sitemap</a>
    <a href="/contact" class="rainbow">Contact</a>
  </h1>
  <?php include('footer.php'); ?>
</body>

</html>