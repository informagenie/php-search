<?php
require_once __DIR__ . '/includes/config.php';

$query = "";

$sql = "SELECT titre, contenu, date_creation creation FROM article";
if (!empty($_GET['s'])) {
    $query = strtolower(trim(htmlspecialchars($_GET['s'])));
    $sql .= " WHERE titre LIKE '%$query%' OR contenu LIKE '%$query%'";
}

$request = $db->query($sql);

//print_r($db->errorInfo());

//Récupère tous les articles sous forme d'un tableau
$articles = $request->fetchAll();


$nb_article = count($articles);

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
            <input value="<?= $query ?>" autocomplete="off" autofocus placeholder="Votre recherche" type="text" name="s"
                   id="search">
            <input type="submit" value="Rechercher" class="btn">
        </form>
    </div>
    <div class="article">
        <?php if (empty($articles)): ?>
            <div class="error">Pas d'article disponible</div>
        <?php else: ?>

            <?php if (!empty($query)): ?>
                <span><?= $nb_article ?> resultat(s) trouvé(s) suite à votre recherche </span>
            <?php endif ?>

            <?php foreach (array_reverse($articles) as $article): ?>
                <article class="article">
                    <h2 class="titre"><a href="#"><?= mark($query, $article['titre']) ?></a></h2>
                    <date><em><?= $article['creation'] ?></em></date>
                    <div class="contenu">
                        <?= mark($query, substr($article['contenu'], 0, 200)) ?>...
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
