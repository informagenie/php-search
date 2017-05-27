# Notre simple blog (Informagenie)

Un exemple d'illustration de la création d'un blog basique avec une barre de recherche pour le cadre du tutoriel [Comment créer une barre de recherche pour son site avec PHP & MySQL](http://www.informagenie.com/barre-de-recherche-site-php-mysql/)

## Utilisation simple

- Téléchargez et mettez les fichiers dans votre serveur web

    `git clone https://github.com/informagenie/php-search.git`

- Créez la base de données **informagenie** et créez les tables avec cette requête sql

    ```mysql
        CREATE TABLE article(
            id INT PRIMARY KEY AUTO_INCREMENT,
            titre VARCHAR(255) NOT NULL,
            contenu TEXT,
            date_creation DATETIME
        )ENGINE=MyISAM
    ```
## Fonctionnalités
- Recherche simple
