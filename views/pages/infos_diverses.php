<div class="container_img_background container_principal">
    <h2>Informations diverses</h2>

    <?php if (isset($_SESSION['admin'])) : ?>
        <!-- Bouton d'ajout d'article -->
        <button type="button" class="bouton" id="addArticleBtn">Ajouter un article</button>
        <!-- Bouton de fermeture textearea -->
        <button type="button" class="bouton hidden" id="closeAddArticleBtn">X</button>
        <!-- Formulaire d'ajout de contenu -->
        <form id="addArticleForm" class="hidden">
            <p>
                <input type="text" name="title" id="title" placeholder="Saisissez un titre..." required aria-label="article title">
            </p>
            <p><textarea class="tiny" name="content" id="content" placeholder="Ecrivez le contenu de l'article" required aria-label="article content"></textarea>
            </p>
            <p>
                <input class="bouton" type="submit" value="Publier">
            </p>
        </form>
    <?php endif; ?>
</div>