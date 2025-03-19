<?php if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
  header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
  exit();
} ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/css/style.css" />
  <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg" />
  <title>Séances</title>
</head>

<body>
  <?php
  require_once 'src/modules/header.php';
  require_once "src/modules/navbar.php"
  ?>

  <main>
    <div class="container_img_background container_principal">
      <section>
        <h2>Les horaires et sites de séances</h2>
        <div class="separation_bottom">
          <div id="container_horaires" class="container_scroll">
            <div id="texte_horaires" class="texte_scroll">
              <h3>Les horaires :</h3>
            </div>
          </div>

          <p class="periode_seances">
            <b>~ </b> <span>Du 01/11 au 01/04</span> <b> ~</b>
          </p>
          <div class="tableau_seance">
            <table>
              <thead>
                <tr>
                  <th>Lundi</th>
                  <th>Mercredi</th>
                  <th>Vendredi</th>
                  <th>Samedi</th>
                  <th>Dimanche</th>
                </tr>
              </thead>
              <tr>
                <td>Navarosse<br />14h30-15h30</td>
                <td>Navarosse<br />14h30-15h30</td>
                <td>Navarosse<br />14h30-15h30</td>
                <td>Sanguinet<br />10h00-11h00</td>
                <td>Navarosse<br />10h00-11h00</td>
              </tr>
              <tr>
                <td>Sanguinet<br />14h30-15h30</td>
                <td></td>
                <td>Parentis<br />14h30-15h30</td>
                <td></td>
                <td>Parentis<br />10h00-11h00</td>
              </tr>
            </table>
            <p>Coupure pendant les fêtes de Noël</p>
          </div>

          <p class="periode_seances">
            <b>~ </b> <span>Du 01/04 au 30/06 et du 01/09 au 31/10</span>
            <b> ~</b>
          </p>
          <div class="tableau_seance">
            <table>
              <thead>
                <tr>
                  <th>Lundi</th>
                  <th>Mercredi</th>
                  <th>Jeudi</th>
                  <th>Vendredi</th>
                  <th>Samedi</th>
                  <th>Dimanche</th>
                </tr>
              </thead>
              <tr>
                <td>Navarosse<br />14h30-15h30</td>
                <td>Navarosse<br />14h30-15h30</td>
                <td>Sanguinet<br />17h30-18h30</td>
                <td>Navarosse<br />14h30-15h30</td>
                <td>Sanguinet<br />10h00-11h00</td>
                <td>Navarosse<br />10h00-11h00</td>
              </tr>
              <tr>
                <td>Sanguinet<br />14h30-15h30</td>
                <td></td>
                <td>Parentis<br />17h30-18h30</td>
                <td>Parentis<br />14h30-15h30</td>
                <td></td>
                <td>Parentis<br />10h00-11h00</td>
              </tr>
            </table>
          </div>

          <p class="periode_seances">
            <b>~ </b> <span>Du 01/07 au 15/08</span> <b> ~</b>
          </p>
          <div class="tableau_seance">
            <table>
              <thead>
                <tr>
                  <th>Lundi</th>
                  <th>Mercredi</th>
                  <th>Jeudi</th>
                  <th>Vendredi</th>
                  <th>Samedi</th>
                  <th>Dimanche</th>
                </tr>
              </thead>
              <tr>
                <td>Navarosse<br />09h30-10h30</td>
                <td>Navarosse<br />09h30-10h30</td>
                <td>Parentis<br />18h00-19h00</td>
                <td>Navarosse<br />09h30-10h30</td>
                <td>Sanguinet<br />09h30-10h30</td>
                <td>Navarosse<br />09h30-10h30</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Parentis<br />14h30-15h30</td>
                <td></td>
                <td>Parentis<br />09h30-10h30</td>
              </tr>
            </table>
            <p>Interruption 15 jours du 15/08 au 31/08</p>
          </div>
        </div>

        <div id="container_sites" class="container_scroll">
          <div id="texte_sites" class="texte_scroll">
            <h3>Les sites de pratique:</h3>
          </div>
        </div>
        <div class="sites">
          - Plage de Maguide<br />
          <a href="src/assets/maguide.pdf" target="_blank"><img src="images/maguide_1.jpg" type="image/jpg"
              alt="Site de Maguide" width="400px" /></a><br />
          - Plage de Port Boissou/Maguide<br />
          <a href="src/assets/maguide_bouissou.pdf" target="_blank"><img src="images/maguide_bouissou_1.jpg"
              type="image/jpg" alt="Site de Maguide/Bouissou" width="400px" /></a><br />
          - Plage de Navarosse<br />
          <a href="src/assets/navarrosse.pdf" target="_blank"><img src="images/navarrosse_1.jpg" type="image/jpg"
              alt="Site de Navarrosse" width="400px" /></a><br />
          - Plage Piaou, Lac de Parentis-en-Born<br />
          <a href="src/assets/parentis.pdf" target="_blank"><img src="images/parentis_1.jpg" type="image/jpg"
              alt="Site de Parentis" width="400px" /></a><br />
          - Plage de Caton, Sanguinet<br />
          <a href="src/assets/" target="_blank"><img src="images/sanguinet_1.jpg" type="image/jpg"
              alt="Site de Sanguinet" width="400px" /></a><br />
        </div>
      </section>
    </div>
  </main>

  <?php require_once("src/modules/footer.php") ?>

  <script src="script_main.js"></script>
</body>

</html>