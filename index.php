<?php

require(__DIR__ . '/includes/connexion.php');

$query = "";

if (!empty($_GET['s'])) {

    $query = strtolower(trim(htmlspecialchars($_GET['s'])));
    //Selectionne tous les articles où le titre ou le contenu contient $query
    $request = $db->query("SELECT * FROM article WHERE titre LIKE '%$query%' OR contenu LIKE '%$query%'");

    //Récupère tous les articles sous forme d'un tableau
    $articles = $request->fetchAll();


    $nb_article = count($articles);

} else {
    $request = $db->query('SELECT * FROM article');
    $articles = $request->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Notre simple blog</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div id="titre">
        <h1><a href="./">Notre simple blog</a></h1>
    </div>
</header>

<div class="container">

    <div class="search">
        <form action="./">
            <input value="<?= $query ?>" placeholder="Votre recherche" type="text" name="s" id="search">
            <input type="submit" value="Rechercher" class="btn">
        </form>
    </div>
    <div class="article">
        <?php if (empty($articles)): ?>
            <div class="error">Pas d'article disponible</div>
        <?php else: ?>

            <?php if (isset($nb_article)): ?>
                <span><?= $nb_article ?> resultat(s) trouvé(s) suite à votre recherche </span>
            <?php endif ?>

            <?php foreach (array_reverse($articles) as $article): ?>
                <article class="article">
                    <h2 class="titre"><a href="#"><?= $article['titre'] ?></a></h2>

                    <div class="contenu">
                        <?= substr($article['contenu'], 0, 200) ?>...
                        [<a class="btn" href="#">Lire la suite</a>]
                    </div>
                </article>
            <?php endforeach ?>

        <?php endif ?>
    </div>
</div>
<footer id="footer">
    <p><a href="http://www.informagenie.com">Informagenie</a></p>
</footer>
</body>
</html>
