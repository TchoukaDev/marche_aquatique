<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/design/css/style.css" />
    <link rel="shortcut icon" href="public/assets/images/favicon.jpeg" type="image/jpeg" />
    <script src="https://cdn.tiny.cloud/1/t5iv00mwkwxr9bk98986eqsgfui2kpyu3b5pmj4oogs95d3g/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <title><?= $title ?></title>
</head>

<body>

    <?php
    require_once 'views/commons/fragments/header.php';
    require_once "views/commons/fragments/navbar.php";
    ?>

    <main>
        <?= $content ?>
    </main>

    <?php require_once "views/commons/fragments/footer.php" ?>

    <script src="public/js/main.js" type="module"></script>
    <script src="public/js/Pages.js" type="module"></script>
    <script src="public/js/Contact.js" type="module"></script>
    <script src="public/js/Index.js" type="module"></script>
    <script src="public/js/Galerie.js" type="module"></script>
    <script src="public/js/TextScroll.js" type="module"></script>


</body>

</html>