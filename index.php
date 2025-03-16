<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/css/style.css" />
  <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg" />
  <title>Les randonneurs des sables du Born - Accueil</title>
</head>

<body>

  <?php
  require_once 'src/modules/header.php';
  require_once "src/modules/navbar.php";
  ?>

  <main>
    <section>
      <div class="container_accueil">
        <div class="date padding10"></div>
        <div class="container_meteo padding10">
          <div id="spinner" class="spinner hidden"></div>
          <div id="meteo_contenu" class="hidden">
            <div id="ville" class="text_center pacifico"></div>
            <div class="description_temperature_icone">
              <div class="description_temperature">
                <div id="description_meteo" class="text_center pacifico"></div>
                <div id="temperature" class="text_center pacifico"></div>
              </div>
              <div id="container_icone_meteo"></div>
            </div>
          </div>
        </div>
        <div class="background_image"></div>

        <div class="container_img_background bienvenue">
          <span>B</span>
          <span>i</span>
          <span>e</span>
          <span>n</span>
          <span>v</span>
          <span>e</span>
          <span>n</span>
          <span>u</span>
          <span>e</span>
        </div>
      </div>
    </section>
    <section>
      <p class="prefooter text_center">
        Suivez-nous également sur notre page Facebook →
        <a id="facebook" href=""><img src="images/facebook.png" type="image/png" alt="logo Facebook" /></a>
      </p>
    </section>
  </main>

  <?php require_once("src/modules/footer.php") ?>

  <script src="script_main.js"></script>
</body>

</html>