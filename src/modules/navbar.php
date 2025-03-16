<?php
//Récupérer le nom de la page actuelle
$pageActuelle = basename($_SERVER['PHP_SELF']);
?>


<nav class="navbar">
  <button id="toggle_navbar">Menu</button>
  <div id="navbar">
    <a href="index.php" class="<?php echo ($pageActuelle == 'index.php') ? 'active' : ''; ?>">Accueil</a>
    <a href="presentation.php" class="<?php echo ($pageActuelle == 'presentation.php') ? 'active' : ''; ?>">Présentation</a>
    <a href="marche_aquatique.php" class="<?php echo ($pageActuelle == 'marche_aquatique.php') ? 'active' : ''; ?>">La marche aquatique</a>
    <a href="seances.php" class="<?php echo ($pageActuelle == 'seances.php') ? 'active' : ''; ?>">Nos séances</a>
    <a href="competitions.php" class="<?php echo ($pageActuelle == 'competitions.php') ? 'active' : ''; ?>">Les compétitions</a>
    <a href="infos_diverses.php" class="<?php echo ($pageActuelle == 'infos_diverses.php') ? 'active' : ''; ?>">Infos diverses</a>
    <a href="galerie.php" class="<?php echo ($pageActuelle == 'galerie.php') ? 'active' : ''; ?>">Galerie</a>
  </div>
</nav>