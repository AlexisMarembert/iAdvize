# iAdvize
test  PHP Développeur

| Fichier | Description |
| ------ | ------ |
| upadate.php | Code PHP qui télécharge les 200 dernières VDMs dans le dossier saved |
| posts.php | Code PHP qui permet la recherche des VDMs selon la ligne de commande entrée en paramètre |
| tests.php | Code PHP qui test le code posts.php |

- ### UPDATE des VDMs
 ```sh
 /api/update
  ```
 - ### EXECUTION de la recherche
 ```sh
 /api/posts/
 /api/posts/$id
 /api/posts
 /api/posts?from=$annee-$mois-$jour&to=$annee-$mois-$jour
 /api/tests?author=$auteur	
 /api/tests?from=$annee-$mois-$jour&to=$annee-$mois-$jour&author=$auteur
 ```
 Remplacer par des valeurs choisis : $id, $annee, $mois, $jour, $auteur.
