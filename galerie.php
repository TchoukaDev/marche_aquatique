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
  require_once "src/modules/navbar.php"
  ?>

  <main>
    <div class="container_img_background container_principal">
      <section>
        <h2>Galerie Photo</h2>
        <div class="carousel-container">
          <div class="slide">
            <img src="images/carousel1.jpg" alt="slide 1" />
          </div>
          <div class="slide">
            <img src="images/carousel2.jpg" alt="slide 2" />
          </div>
          <div class="slide">
            <img src="images/carousel3.jpg" alt="slide 3" />
          </div>
          <div class="slide">
            <img src="images/carousel4.jpg" alt="slide 4" />
          </div>
          <div class="slide">
            <img src="images/carousel5.jpg" alt="slide 5" />
          </div>
          <div class="slide">
            <img src="images/carousel6.jpg" alt="slide 6" />
          </div>
          <div class="slide">
            <img src="images/carousel7.jpg" alt="slide 7" />
          </div>
          <div class="slide">
            <img src="images/carousel8.jpg" alt="slide 8" />
          </div>

          <div class="controls">
            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>
          </div>

          <div class="slide-progress">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
          </div>
        </div>
      </section>
    </div>
  </main>
  <?php require_once("src/modules/footer.php") ?>

  <script src="script_main.js"></script>
</body>

</html>