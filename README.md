# iAdvize
## Test PHP Développeur

> - Ce test proposé par iAdvize a été réalisé sous Windows 10.
> - J'ai utilisé WampServer pour exécuter mon code php sous Windows
> - J'exécute sur ma machine, mon code de la manière suivante dans l'URL :
> ```sh
> /localhost/update.php
> /localhost/posts.php
> /localhost/tests.php
> ```

| Fichier | Description |
| ------ | ------ |
| Test métier... | PDF du sujet test PHP Développeur |
| upadate.php | Code PHP qui enregistre les 200 dernières VDMs dans le dossier saved |
| posts.php | Code PHP qui permet la lecture des VDMs selon la ligne de commande entrée en paramètre |
| tests.php | Code PHP qui test unitairement le code posts.php |
| composer.json | Code JSON qui gère les dépendances |

| Dossier | Description |
| ------ | ------ |
| saved | Contenu des 200 fichiers .json de VDM de la dernière update (exécuter update.php pour le créer) |
| testSaved | Contenu des 200 fichiers .json des VDMs tests |
| simple_html_dom | Librairie qui permet de chercher dans une page web |

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
