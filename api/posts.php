<?php

	// Pour les accents
	header('Content-Type: text/html; charset=utf-8');
	//¨Pour la mise en page
	header('Content-Type: application/json');

	// On vérifie si un id de post est donné
	if (isset($_SERVER['PATH_INFO'])) {
		
		// On récupère l'ID
		$id = intval(substr($_SERVER['PATH_INFO'], 1));
	  
		// On affiche le post si il existe, sinon une erreur
		if (file_exists("saved/$id.json")) {
			echo '{"post":';
			readfile("saved/$id.json");
			echo '}';
		} else {
			echo '{"error":"id not found!"}';
		}
		
	} else {
		
		// On récupère les paramètres
		$from = null;
		if (isset($_GET['from'])) {
			$from_elements = explode('-', $_GET['from']);
			$from = mktime(0, 0, 0, intval($from_elements[1]), intval($from_elements[2]), intval($from_elements[0])); // Comme le paramètre from donne un jour, on l'inclu en mettant minuit comme heure
		}
		$to = null;
		if (isset($_GET['to'])) {
			$to_elements = explode('-', $_GET['to']);
			$to = mktime(23, 59, 59, intval($to_elements[1]), intval($to_elements[2]), intval($to_elements[0])); // Comme le paramètre to donne un jour, on l'inclu en mettant la dernière seconde de la journée
		}
		$author = null;
		if (isset($_GET['author'])) {
			$author = $_GET['author'];
		}
		
		// On lit tous les messages
		$count = 0; // Nombre de messages selectionnés
		$posts = array("posts" => array());
		for ($i = 1; $i <= 200; $i++) {
			
			// On récupère le json
			$json = json_decode(file_get_contents("saved/$i.json"));
			
			// On récupère le timestamp du post
			$ts = strtotime($json->date);
			
			// On vérifie la date de départ (on exclura le post si il est plus vieux) (si néscessaire)
			if ($from !== null && $ts < $from) {
				continue;
			}
			
			// On vérifie la date d'arrivée (on exclura le post si il est plus récent) (si néscessaire)
			if ($to !== null && $ts > $to) {
				continue;
			}
			
			// On vérifie l'auteur (on exclura le post si il n'est pas de cet auteur)
			if ($author !== null && $author != $json->author) {
				continue;
			}
			
			// Si on arrive ici, cela signifie que le post satisfait toutes les conditions, on peut donc l'ajouter à la liste
			$posts["posts"][$count] = $json;
			$count++;
			
		}
		
		// On ajoute le nombre de posts trouvés
		$posts["count"] = $count;
		
		// On affiche le json
		echo json_encode($posts, JSON_PRETTY_PRINT);
		
	}
?>