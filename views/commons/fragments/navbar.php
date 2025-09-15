<?php


//Récupérer le nom de la page actuelle
$pageActuelle = isset($_GET['page']) ? $_GET['page'] : 'acceuil'
?>


<nav class="navbar">
  <button id="toggle_navbar">Menu</button>
  <div id="navbar">
    <a href="accueil" class="<?php echo ($pageActuelle == 'accueil') ? 'active' : ''; ?>">Accueil</a>
    <a href="presentation" class="<?php echo ($pageActuelle == 'presentation') ? 'active' : ''; ?>">Présentation</a>
    <a href="marche_aquatique" class="<?php echo ($pageActuelle == 'marche_aquatique') ? 'active' : ''; ?>">La marche aquatique</a>
    <a href="seances" class="<?php echo ($pageActuelle == 'seances') ? 'active' : ''; ?>">Nos séances</a>
    <?php if (isset($_SESSION['connected'])): ?> <a href="competitions" class="<?php echo ($pageActuelle == 'competitions') ? 'active' : ''; ?>">Les compétitions</a><?php endif ?>
    <a href="infos_diverses" class="<?php echo ($pageActuelle == 'infos_diverses') ? 'active' : ''; ?>">Infos diverses</a>
    <a href="galerie" class="<?php echo ($pageActuelle == 'galerie') ? 'active' : ''; ?>">Galerie</a>
  </div>
</nav>