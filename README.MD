# Notre simple blog (Informagenie)

Une illustration de la création d'un blog basique avec une barre de recherche dans le cadre du tutoriel [Comment créer une barre de recherche pour son site avec PHP & MySQL](http://www.informagenie.com/barre-de-recherche-site-php-mysql/)

## Fonctionnalités
- Recherche simple

## Utilisation simple

- Téléchargez et mettez les fichiers dans votre serveur web

    `git clone https://github.com/informagenie/php-search.git`

- Créez la base de données **informagenie** et créez la table article avec cette requête sql

```mysql
    CREATE TABLE article(
        id INT PRIMARY KEY AUTO_INCREMENT,
        titre VARCHAR(255) NOT NULL,
        contenu TEXT,
        date_creation DATETIME
    )ENGINE=MyISAM
```
- Ouvrez `includes/connexion.php` et commentez la connexion sqlite et décommentez la connexion mysql

```php
	#$db = new PDO('sqlite:'. __DIR__.'/../db');
    	$db = new PDO('mysql:host=localhost;dbname=informagenie;charset=utf8', 'root', '');
```

- Creation des articles
Vous pouvez vous servir de PHPMYADMIN pour créer les articles ou bien rapidement vous pouvez ajouter ces enregistremets

```mysql
    INSERT INTO `article` (`id`, `titre`, `contenu`, `date_creattion`) VALUES
    (1, 'Test de notre premier article', 'Notre premier article à l\'ère de très bien fonctionner', '2017-05-19 03:22:09'),
    (2, 'Test de notre deuxième article', '    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab fuga libero magnam nostrum repudiandae! Aut beatae debitis ea error laudantium magni quia rerum. Consectetur iure, maxime omnis quos saepe voluptas.\r\n', '2017-05-19 04:08:21'),
    (3, 'Article de la finalité', 'Dans l\'imédiat, nous allons chercher à connaitre les choix qui existent entre les autres et les autres', '2017-05-19 07:17:40');
```
