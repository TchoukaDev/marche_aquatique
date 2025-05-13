<div class="container_img_background container_principal">
    <h2>Informations diverses</h2>

    <?php if (isset($_SESSION['admin'])) : ?>
        <!-- Bouton d'ajout d'article -->
        <button type="button" class="bouton" id="addArticleBtn">Ajouter un article</button>


        <!-- Formulaire d'ajout de contenu -->
        <form id="addArticleForm" method="POST" action="infos_diverses/addArticle" enctype="multipart/form-data" class="hidden adminForm">
            <div class="containerCloseBtn">
                <button type="button" class="bouton hidden" id="closeAddArticleBtn" title="Fermer l'éditeur de texte"><svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="16" height="16"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg></button>
            </div>
            <p>
                <input type="text" name="title" placeholder="Saisissez un titre..." required aria-label="article title">
            </p>
            <p>
                <textarea name="content" placeholder="Ecrivez le contenu de l'article..." aria-label="article content"></textarea>
            </p>
            <p>
                <label class=text_sm for="image">Ajouter une image:</label>
                <br>
                <input type="file" name="image">
            </p>
            <p>
                <input class="bouton" type="submit" value="Publier">
            </p>
        </form>

        <?php
        if (isset($_SESSION['articleError'])) : ?>
            <p class="error">
                <?= $_SESSION['articleError'];
                unset($_SESSION['articleError']); ?>
            </p>
        <?php
        endif;
        if (isset($_SESSION['articleSuccess'])) : ?>
            <p class="success">
                <?= $_SESSION['articleSuccess'];
                unset($_SESSION['articleSuccess']); ?>
            </p>
    <?php
        endif;
    endif; ?>


    <?php

    if (count($articles) === 0) : ?>
        <section>
            Il n'y a aucune publication pour le moment.
        </section>
    <?php endif;

    foreach ($articles as $article) :
        $encodedContent = $article['content'];
        $content = html_entity_decode($encodedContent);
        $dateTime = new DateTime($article['creation_date']);
        $date =  $dateTime->format('d/m/Y H:i');
        $lastArticle = end($articles); ?>
        <section>
            <?php
            if (isset($_SESSION['admin'])) : ?>
                <!-- boutons modifier et supprimer -->
                <div class="text_end">
                    <button type="button" class='bouton' id="updateArticleBtn_<?= $article['id'] ?>" title="Modifier la publication"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-9.5 9.5a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l9.5-9.5zM11.207 2L13 3.793 14.293 2.5 12.5.707 11.207 2zM10.5 2.707L2 11.207V13h1.793l8.5-8.5L10.5 2.707z" />
                        </svg></button>
                    <button type="button" class="bouton" id="deleteArticleBtn_<?= $article['id'] ?>" title="Supprimer la publication"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.5 5.5a.5.5 0 0 1 .5-.5H6h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5zM4.5 2.5A.5.5 0 0 1 5 2h6a.5.5 0 0 1 .5.5V3H14a.5.5 0 0 1 0 1h-1.132l-.858 9.171A1.5 1.5 0 0 1 10.516 14H5.484a1.5 1.5 0 0 1-1.494-1.829L3.132 4H2a.5.5 0 0 1 0-1h2.5v-.5z" />
                        </svg>
                    </button>
                </div>



                <!-- Formulaire de modification -->
                <form id="updateArticleForm_<?= $article['id'] ?>" method="POST" action="infos_diverses/updateArticle" enctype="multipart/form-data" class="hidden adminForm">
                    <div class="containerCloseBtn">
                        <button type="button" class="bouton hidden align_self_end" id="closeUpdateArticleBtn_<?= $article['id'] ?>" title="Fermer l'éditeur de texte"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                width="16" height="16"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg></button>
                    </div>
                    <p>
                        <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
                    </p>
                    <p>
                        <input type="text" name="title" value="<?= $article['title'] ?>" required aria-label="article title">
                    </p>
                    <p><textarea class="tiny" name="content" aria-label="article content"><?= $article['content'] ?></textarea>
                    </p>
                    <p>
                        <label for="image">Image: </label><br>
                        <input type="file" name="image">
                    </p>
                    <p>
                        <input class="bouton" type="submit" value="Publier">
                    </p>
                </form>
            <?php endif; ?>


            <!-- Affichage de chaque article -->
            <div class="articleHeader">
                <p class="text_lg c4 fantasy"><?= $article['title'] ?></p>
                <p class="text_muted text_sm">Publié le <?= $date ?></p>
            </div>
            <p><?= $content ?></p>
            <?php if (!empty($article['image'])) : ?>
                <p class="text_center">
                    <img class="articleImg" src="public/uploads/articles/<?= $article['image'] ?>">
                </p>
            <?php endif;
            if ($article !== $lastArticle) : ?>
                <hr>
            <?php endif; ?>
        </section>

    <?php
    endforeach; // Modale
    echo $deleteArticleModal;
