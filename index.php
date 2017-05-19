<?php
require(__DIR__ . '/includes/connexion.php');


if (!empty($_GET['s'])) {
    $query = htmlspecialchars($_GET['s']);
    $request = $db->query("SELECT * FROM article WHERE titre LIKE '%$query%'");
    $articles = $request->fetchAll();
} else {
    $request = $db->query('SELECT * FROM article');
    $articles = $request->fetchAll();
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test de recherche</title>
    <style>

    </style>
</head>
<body>
<div class="container">
    <h1>Notre simple blog</h1>
    <article>
        <?php if (empty($articles)): ?>
            <div class="error">Pas d'article disponible</div>
        <?php else: ?>
        <?php foreach ($articles as $article): ?>
            <div class="title"><?= $article['titre'] ?></div>
            <div class="contenu"><?= $article['contenu'] ?></div>
        <?php endforeach ?>
        <?php endif ?>
    </article>
</div>
</body>
</html>
