<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Connexion Sécurisée MVCS</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.bundle.js" defer></script>
    <script src="js/script.js" defer></script>
    <?php 
    // ajout du CSS pour la vue à rendre
    if (isset($view_name)) { ?>
        <link rel="stylesheet" href="/css/<?= $view_name ?>.css" type="text/css">
    <?php } // fin du foreach d'intégration des fichiers CSS?>
</head>

<body>
    <main>
        <!-- la variable $content utilisée ci-dessous est initialisé par la classe mère "Controller.php" -->
        <?= $content ?>
    </main>
</body>