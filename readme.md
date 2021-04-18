# CHAT APP => Test technique

Un Tchat, construit sur un modèle MVC, sans framework.

## Installation

Utiliser le package [composer](https://getcomposer.org/) pour installer les dépendances.

```bash
composer install
composer dump-autoload
```

Ensuite deplacez vous dans le dossier du projet et démarrer le serveur avec la commande :

```bash
php -S 127.0.0.1:8000 -t .
```

Accéder sur l'application à travers [ce lien](http://127.0.0.1:8000/).

La base de données va être crée automatiquement avec un jeu de test ( utilisateurs avec un archive de conversations )

Vous trouvez le script de la base de données au racine du projet si vous avez rencontré des problèmes.
