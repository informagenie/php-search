#Notre simple blog
Un exemple d'illustration de la création d'un blog basique créé sur [informagenie](http://www.informagenie.com) pour débutant
##Utilisation simple
- Téléchargez et mettez les fichiers dans votre serveur web
```
git clone https://github.com/informagenie/php-search.git
```
- Créez la base de données **informagenie** et créez les tables avec cette requête sql
```
CREATE TABLE article(
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT,
    date_creation DATETIME
)ENGINE=MyISAM
```

##Fonctionnalités
- Recherche simple