# iAdvize
## Test PHP Développeur

> - Ce test proposé par iAdvize a été réalisé sous Windows 10.
> - J'ai utilisé Wamp pour exécuter mon code php sous Windows
> - J'exécute mon code de la manière suivante dans l'URL :
```sh
/localhost/update.php
/localhost/posts.php
/localhost/tests.php
```

| Fichier | Description |
| ------ | ------ |
| upadate.php | Code PHP qui enregistre les 200 dernières VDMs dans le dossier saved |
| posts.php | Code PHP qui permet la lecture des VDMs selon la ligne de commande entrée en paramètre |
| tests.php | Code PHP qui test le code posts.php |
| composer.json | Code JSON qui gère les dépendances |

- ### STOCKAGE des VDMs
```sh
/api/update
```
- ### LECTURE des VDMs
```sh
/api/posts/
/api/posts/$id
/api/posts
/api/posts?from=$annee-$mois-$jour&to=$annee-$mois-$jour
/api/tests?author=$auteur	
/api/tests?from=$annee-$mois-$jour&to=$annee-$mois-$jour&author=$auteur
```
Remplacer par des valeurs choisis : $id, $annee, $mois, $jour, $auteur.

- ### TESTS de la lecture
```sh
/api/tests
```
