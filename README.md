# iAdvize
## Test PHP Développeur

> - Ce test proposé par iAdvize le 06/04/2017 a été réalisé sous Windows 10 pour le 10/04/2017.
> - J'ai utilisé WampServer pour exécuter mon code php sous Windows
> - J'exécute sur ma machine, mon code de la manière suivante dans l'URL :
> ```sh
> /localhost/update
> /localhost/posts
> /localhost/tests
> ```

Liste des fichiers utiles à la réalisation du test.

| Fichier | Description |
| ------ | ------ |
| Test métier... | PDF du sujet test PHP Développeur |
| upadate.php | Code PHP qui enregistre les 200 dernières VDMs dans le dossier saved |
| posts.php | Code PHP qui permet la lecture des VDMs selon les paramètres entrés |
| tests.php | Code PHP qui test unitairement le code posts.php |
| composer.json | Code JSON qui gère les dépendances |


Liste des dossiers utiles à la réalisation du test.

| Dossier | Description |
| ------ | ------ |
| saved | Contenu des 200 fichiers .json de VDM de la dernière update (exécuter update.php pour le créer) |
| testSaved | Contenu des 200 fichiers .json des VDMs tests |
| simple_html_dom | Librairie qui permet de chercher dans une page web |

- ### STOCKAGE des VDMs
Permet de créer le dossier "saved" contenant les dernières VDM du site http://www.viedemerde.fr/ au format JSON.
```sh
php /api/update.php
```
- ### LECTURE des VDMs
Liste de commandes réalisables pour la lecture des VDMs. 
```sh
php /api/posts.php
php /api/posts.php/$id
php /api/posts.php/
php /api/posts.php?from=$annee-$mois-$jour&to=$annee-$mois-$jour
php /api/tests.php?author=$auteur	
php /api/tests.php?from=$annee-$mois-$jour&to=$annee-$mois-$jour&author=$auteur
```
/!\ Remplacer par des valeurs choisis les variables suivantes : $id, $annee, $mois, $jour, $auteur.

- ### TESTS de la lecture
Utiliser la commande suivante pour lancer le test unitaire.
```sh
php /api/tests.php
```
> par Alexis MAREMBERT
