# CHAT APP => Test technique

Un Tchat, construit sur un modèle MVC, sans framework.

## Installation

Utiliser le gestionnaire de dépendances [composer](https://getcomposer.org/) pour installer les dépendances.

Deplacez vous dans le dossier du projet et exécuter les commandes suivantes:

```bash
composer install
composer dump-autoload
```

Ensuite démarrer le serveur avec la commande :

```bash
php -S 127.0.0.1:8000 -t .
```

NB: Vérifier que votre serveur Mysql est bien démarré.

La base de données va être crée automatiquement avec un jeu de test ( utilisateurs avec un archive de conversations ).

Vous trouvez le script de la base de données au racine du projet si vous avez rencontré des problèmes.

Accéder à l'application avec [ce lien](http://127.0.0.1:8000/).
