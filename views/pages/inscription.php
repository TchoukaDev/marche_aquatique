<form method="POST" action="inscription" class="container_principal text_center">
    <h2>Inscription</h2>

    <div class="grid grid_inscription">
        <p>
            <label for="firstname">Prénom: </label><br>
            <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" autocomplete="given-name" required class="input_block">
        </p>
        <p>
            <label for="name">Nom de famille: </label><br>
            <input type="text" name="name" id="name" placeholder="Votre nom" autocomplete="family-name" required class="input_block">

        </p>
    </div>
    <div class="grid grid_inscription">
        <p>
            <label for="email">Adresse mail: </label><br>
            <input type="email" name="email" id="email_inscription" placeholder="Votre adresse email" autocomplete="email" required class="input_block">
        </p>
        <p>
            <label for="telephone">Téléphone: </label><br>
            <input type="tel" name="telephone" id="telephone" placeholder="Votre n° de téléphone" autocomplete="tel" required class="input_block">
        </p>
    </div>
    <div class="grid grid_inscription">
        <p>
            <label for="password">Mot de passe: </label><br>
            <input type="password" name="password" id="password_inscription" placeholder="Votre mot de passe" autocomplete="new-password" required class="input_block">
        </p>

        <p>
            <label for="check_password">Saisissez à nouveau votre mot de passe: </label><br>
            <input type="password" name="check_password" id="check_password" placeholder="Votre mot de passe" required class="input_block">
        </p>
    </div>
    <p>
        <input type="submit" value="Envoyer" class="bouton">
    </p>

    <?php
    if (isset($_SESSION['errorSignUp'])) : ?>
        <p class="error"><?= htmlspecialchars($_SESSION['errorSignUp']) ?></p>
    <?php
        unset($_SESSION['errorSignUp']);
    endif;
    if (isset($_SESSION['successSignUp'])) : ?>
        <p class="success"><?= htmlspecialchars($_SESSION['successSignUp']) ?></p>
    <?php
        unset($_SESSION['successSignUp']);
    endif;
    ?>

</form>