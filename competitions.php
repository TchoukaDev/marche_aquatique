<?php if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
  header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
  exit();
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/css/style.css" />
  <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg" />
  <title>Galerie</title>
</head>

<body>

  <?php
  require_once 'src/modules/header.php';
  require_once("src/modules/navbar.php") ?>

  <div class="container_img_background"></div>

  <?php require_once("src/modules/footer.php") ?>

  <script src="script_main.js"></script>
</body>

</html>