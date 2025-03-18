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
        <p class="text_center titre_connexion">Connexion</p>
        <form action="connexion.php" method="post" class=form_connexion>
            <p>
                <input type=text name="email" id="email" placeholder="Email" autocomplete="email" class="input" required aria-label="email">
            </p>
            <p>
                <input type="password" name="password" id="password" placeholder="Mot de passe" autocomplete="current-password" class="input" required aria-label="mot de passe">
            </p>
            <p>
                <input type="submit" value="Se connecter" class="bouton">
            </p>
        </form>
        <p class=lien_inscription>Pas encore inscrit? <a class="inscription" href="inscription.php">Inscrivez-vous</a></p>
    </div>

</header>