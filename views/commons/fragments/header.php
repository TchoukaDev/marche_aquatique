 <header>
     <div class="logos">
         <img src="public/assets/images/longe_cote.jpg" alt="logo longe cote" />
         <img src="public/assets/images/image_randonneur.png" alt="logo du club" />
     </div>
     <div class="titre text_center">
         ~~ Marche Aquatique ~~ <br />
         Les randonneurs des Sables du Born
     </div>
     <div class="container_connexion">
         <?php if (isset($_SESSION['connected'])) : ?>
             <p class="text_center bonjour_connexion">Bonjour <?= htmlspecialchars($_SESSION['user']['forename']) ?><br>
                 Bienvenue sur notre site!</p>
             <a class=bouton_deconnexion href="deconnexion"><button class="bouton">Se déconnecter</button></a>

         <?php else : ?>

             <p class="text_center titre_connexion">Connexion</p>
             <form action="connexion" method="post" class=form_connexion>
                 <p>
                     <input type=email name="email" id="email" placeholder="Email" autocomplete="email" class="input" required aria-label="email">
                 </p>
                 <p>
                     <input type="password" name="password" id="password" placeholder="Mot de passe" autocomplete="current-password" class="input" required aria-label="mot de passe">
                 </p>
                 <p>
                     <input type="submit" value="Se connecter" class="bouton"><br>
                     <span class="autoLogin"><label for='autoLogin'>Se souvenir de moi</label>
                         <input type="checkbox" name="autoLogin" id="autoLogin" checked></span>
                 </p>
             </form>
             <p class="lien_inscription">Pas encore inscrit? <a class="inscription" href="inscription">Inscrivez-vous.</a></p>
             <?php
                if (isset($_SESSION['error'])) : ?>
                 <div class="error"><?= htmlspecialchars($_SESSION['error']); ?></div>
         <?php
                    unset($_SESSION['error']);
                endif;
            endif;
            ?>
     </div>

 </header>