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
  <title>Présentation du club</title>
</head>

<body>
  <?php
  require_once 'src/modules/header.php';
  require_once "src/modules/navbar.php"
  ?>

  <main>
    <div class="container_img_background container_principal">
      <section>
        <h2>Présentation</h2>
        <div class="separation_bottom">
          <div id="container_club" class="container_scroll">
            <div id="texte_club" class="texte_scroll">
              <h3>Le club:</h3>
            </div>
          </div>
          <p>
            Le club des Randonneurs des Sables du Born est un club
            Multi-activités (Rando, Marche Nordique, Montagne et Marche
            Aquatique ) créé en 1986 et comptant pour l’heure 360 adhérents
            (1<sup>er</sup> club des Landes).
          </p>

          <p>
            La section Marche Aquatique est arrivée en 2018 et compte pour
            l’heure plus de 120 pratiquants.
          </p>

          <p>
            L’activité est encadrée par 8 animateurs brevetés (avec 2 en
            formation en 2025) et 13 assistants formés localement et se
            déroule uniquement en Milieu lacustre à cause de la dangerosité du
            Littoral Biscarrossais.
          </p>
          <p>
            Le club organise en revanche régulièrement des sorties en milieu
            maritime à Arcachon, Côte Basque et Royan.
          </p>
          <p>
            Des baptêmes sont possibles tout au long de l’année au prix de 5
            euros et en fonction des créneaux disponibles.
          </p>
        </div>

        <div id="container_animateurs" class="container_scroll">
          <div id="texte_animateurs" class="texte_scroll">
            <h3>Les animateurs:</h3>
          </div>
        </div>
        <div class="trombinoscope text_center">
          <figure>
            <img src="images/Alain WIRTH.jpg" type="image/jpg" alt="Alain WIRTH" />
            <figcaption>
              Alain WIRTH, Référent régional, Formateur régional, Entraîneur
            </figcaption>
          </figure>
          <figure>
            <img src="images/Marie_Thérèse ABILY.jpg" type="image/jpg" alt="Maite ABILY" />
            <figcaption>Maite ABILY, Référente Club</figcaption>
          </figure>
          <figure>
            <img src="images/Sabine GUINGNIER.jpg" type="image/jpg" alt="Sabine GUINGNIER" />
            <figcaption>Créatrice du Club, Animatrice Santé</figcaption>
          </figure>
          <figure>
            <img src="images/Bertrand PERRIN.jpg" type="image/jpg" alt="Bertrand PERRIN" />
            <figcaption>Bertrand PERRIN, Animateur</figcaption>
          </figure>
          <figure>
            <img src="images/Margit FERNANDEZ.jpg" type="image/jpg" alt="Margit FERNANDEZ" />
            <figcaption>Margit FERNANDEZ, Animatrice Santé</figcaption>
          </figure>
          <figure>
            <img src="images/Jean-Pierre PEYROU.jpg" type="image/jpg" alt="Jean-Pierre PEYROU" />
            <figcaption>Jean-Pierre PEYROU, Arbitre</figcaption>
          </figure>
          <figure>
            <img src="images/Christian BANZONI.jpg" type="image/jpg" alt="Christian BANZONI" />
            <figcaption>Christian BENZONI, Animateur</figcaption>
          </figure>
          <figure>
            <img src="images/Alain L'HUILLIER.jpg" type="image/jpg" alt="Alain LHUILLIER" />
            <figcaption>Alain LHUILLIER</figcaption>
          </figure>
          <figure>
            <img src="images/avatar.webp" type="image/webp" alt="avatar Marceline MOULIRA" />
            <figcaption>
              Marceline MOULIRA, Animatrice en formation
            </figcaption>
          </figure>
          <figure class="lafont">
            <img src="images/avatar.webp" type="image/wepb" alt="avatar Séverine LAFONT" />
            <figcaption>Séverine LAFONT, Animatrice en formation</figcaption>
          </figure>
        </div>
      </section>
    </div>
  </main>

  <?php require_once("src/modules/footer.php") ?>

  <script src="script_main.js"></script>
</body>

</html>