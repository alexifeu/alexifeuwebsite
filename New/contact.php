<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Get in touch with Alexifeu! Contact Alexander Rankl for inquiries, feedback, or just to say hello.">
  <meta name="keywords" content="contact Alexifeu, contact Alexander Rankl, inquiries, feedback, reach out">
  <meta property="og:title" content="Contact Alexifeu - Get in Touch with Us">
  <meta property="og:description" content="Have a question or comment? Reach out to Alexifeu and talk directly to the creator, Alexander Rankl.">
  <meta property="og:image" content="path/to/image.jpg">
  <link rel="stylesheet" href="style.css">
  <title>Contact</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>
  <?php require 'nav.php'; ?>
  <h1>Contact</h1>
  <a href="mailto:alexifeu@aol.com">
    <img src="img/AOL.svg" alt="AOL" width="400">
  </a>
  <main class="textcontainer">
    <p>If you have any questions, need support, or require further assistance,</p>
    <p>please don't hesitate to contact us.</p>
    <p>
      E-Mail: <a class="contact" href="mailto:alexifeu@aol.com">alexifeu@aol.com</a>
    </p>
  </main>
  <?php include('footer.php'); ?>
</body>

</html>