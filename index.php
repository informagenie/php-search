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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1 id="titre"><a href="#">Notre simple blog</a></h1>

    <div class="article">
        <?php if (empty($articles)): ?>
            <div class="error">Pas d'article disponible</div>
        <?php else: ?>
            <?php foreach ($articles as $article): ?>
                <article class="article">
                    <h1 class="titre"><a href="#"><?= $article['titre'] ?></a></h1>

                    <div class="contenu">
                        <?= substr($article['contenu'], 0, 200) ?>...
                        [<a href="#">Lire la suite</a>]
                    </div>
                </article>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>
</body>
</html>
