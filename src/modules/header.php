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
                <label for="email">Email </label>
                <input type=text name="email" id="email" autocomplete="email" required>
            </p>
            <p>
                <label for='motDePasse'>Mot de passe: </label>
                <input type="password" name="password" id="password" autocomplete="current-password" required>
            </p>
        </form>
        <p class=lien_inscription>Pas encore inscrit? <a class="inscription" href="inscription.php">Inscrivez-vous</a></p>
    </div>

</header>