<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/css/style.css" />
  <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg" />
  <title>La marche aquatique</title>
</head>

<body>
  <?php
  require_once 'src/modules/header.php';
  require_once "src/modules/navbar.php"
  ?>

  <main>
    <div class="container_img_background container_principal">
      <section>
        <h2>la marche aquatique</h2>

        <div class="separation_bottom">
          <div id="container_marche" class="container_scroll">
            <div id="texte_marche" class="texte_scroll">
              <h3>Qu'est-ce que la marche aquatique?</h3>
            </div>
          </div>
          <p>
            Le longe côte ou marche aquatique consiste à marcher en milieu
            aquatique (océans, mers, lacs…) avec une hauteur d’eau située
            entre le nombril et les aisselles. L’activité se pratique à
            plusieurs tout au long de l’année, sur des plages de sable à
            faible devers ne présentant ni obstacle majeur, ni risque
            particulier.
          </p>
          <p>
            Le longe côte est à l’origine une méthode de musculation avec
            pagaie conçue pour l’entraînement des rameurs. Née en 2005 sur le
            littoral du nord de la France, cette pratique a été élaborée par
            Thomas Wallyn, un entraîneur professionnel d’aviron, à la
            recherche d’une activité de renforcement musculaire et
            cardiovasculaire sans traumatisme articulaire.
          </p>
          <p>
            Grâce à ses vertus et sa convivialité, l’activité connaît un très
            fort engouement et se pratique désormais sur la majorité du
            littoral français et depuis peu, en milieu lacustre.
          </p>
        </div>

        <div id="container_bienfaits" class="container_scroll">
          <div id="texte_bienfaits" class="texte_scroll">
            <h3>Intérêts et bienfaits:</h3>
          </div>
        </div>
        <p>
          <b>~</b> une pratique accessible à tous : inutile d’être sportif
          confirmé, il suffit d’adapter sa pratique à son niveau et être
          encadré par un animateur diplômé (un avis médical au préalable est
          souhaité).
        </p>
        <p>
          <b>~</b>  une activité salutaire au bien-être et à la santé : elle
          permet un renforcement musculaire et cardiovasculaire sans
          traumatisme articulaire, favorise la circulation sanguine et
          améliore l’équilibre et l’endurance.
        </p>
        <p>
          <b>~</b>  un moment de plaisir et de convivialité : activité
          bienfaisante et relaxante. Chacun avance à son rythme tout en
          partageant le plaisir de se retrouver en groupe pour une activité
          vivifiante en plein air.
        </p>
      </section>
    </div>
  </main>

  <?php require_once("src/footer.php") ?>

  <script src="script_main.js"></script>
</body>

</html>