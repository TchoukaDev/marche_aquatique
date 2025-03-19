 <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
        header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    }
    ?>

 <header>
     <div class="logos">
         <img src="images/longe_cote.jpg" type="image.jpg" alt="logo longe cote" />
         <img src="images/image_randonneur.png" type="image.png" alt="logo du club" />
     </div>
     <div class="titre text_center">
         ~~ Marche Aquatique ~~ <br />
         Les randonneurs des Sables du Born
     </div>
     <div class="container_connexion">
         <?php if (isset($_SESSION['connecte'])) {
                echo '<p class="text_center bonjour_connexion">Bonjour ' . htmlspecialchars($_SESSION['forename']) . '.<br>Bienvenue sur notre site!</p>
                <a class=bouton_deconnexion href="deconnexion.php"><button class="bouton">Se déconnecter</button></a>';
            } else { ?>

             <p class="text_center titre_connexion">Connexion</p>
             <form action="src/modules/connexion.php" method="post" class=form_connexion>
                 <p>
                     <input type=email name="email" id="email" placeholder="Email" autocomplete="email" class="input" required aria-label="email">
                 </p>
                 <p>
                     <input type="password" name="password" id="password" placeholder="Mot de passe" autocomplete="current-password" class="input" required aria-label="mot de passe">
                 </p>
                 <p>
                     <input type="submit" value="Se connecter" class="bouton"><br>
                     <span class="autoconnect"><label for='autoconnect'>Se souvenir de moi</label>
                         <input type="checkbox" name="autoconnect" id="autoconnect" checked></span>
                 </p>
             </form>
             <p class="lien_inscription">Pas encore inscrit? <a class="inscription" href="inscription.php">Inscrivez-vous.</a></p>
             <?php
                if (isset($_SESSION['error'])) { ?>
                 <div class="error"><?php echo htmlspecialchars($_SESSION['error']); ?></div>
         <?php
                    unset($_SESSION['error']);
                }
            }
            ?>
     </div>

 </header>