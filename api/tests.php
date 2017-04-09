<?php
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////// Pour tester le code exécuter le code comme suit: /api/tests ////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// Pour les accents
	header('Content-Type: text/html; charset=utf-8');
	//¨Pour la mise en page
	header('Content-Type: application/json');
	
	// On initialise l'ID
	$id =125;
	
	// On intialise from le 29 février 2017
	$from = mktime(0, 0, 0, 2, 29, 2017); 
	
	// On intialise to le 29 mars 2017
	$to = mktime(23, 59, 59, 3, 29, 2017);
	
	// On initialise l'auteur au nom de Louis
	$author = "Louis";
	
	$countDate = 0;	// Total de VDMs dans le bon intervale de dates
	$countAuthor = 0;	// Total de VDMs avec le bon auteur
	$count = 0; 			// Total des VDMs avec les deux conditons en même temps

	// On lit tous les messages
	for ($i = 1; $i <= 200; $i++) {
		
		$json = json_decode(file_get_contents("testSaved/$i.json"));
		$ts = strtotime($json->date);
		
		// On vérifie la date de départ
		if ($from !== null && $ts < $from) {
			continue;
		}
		
		// On vérifie la date d'arrivée
		if ($to !== null && $ts > $to) {
			continue;
		}
		
		$countDate++;
	}

	for ($i = 1; $i <= 200; $i++) {
		
		$json = json_decode(file_get_contents("testSaved/$i.json"));
		$ts = strtotime($json->date);
		
		// On vérifie l'auteur (on exclura le post si il n'est pas de cet auteur)
		if ($author !== null && $author != $json->author) {
			continue;
		}
		
		$countAuthor++;
	}

	for ($i = 1; $i <= 200; $i++) {
		
		// On récupère le json
		$json = json_decode(file_get_contents("testSaved/$i.json"));
		
		// On récupère le timestamp du post
		$ts = strtotime($json->date);
		
		// On vérifie la date de départ
		if ($from !== null && $ts < $from) {
			continue;
		}
		
		// On vérifie la date d'arrivée
		if ($to !== null && $ts > $to) {
			continue;
		}
		
		// On vérifie l'auteur
		if ($author !== null && $author != $json->author) {
			continue;
		}
		
		// Si on arrive ici, cela signifie que le post satisfait toutes les conditions
		$count++;
		
	}	

	echo "TESTS posts.php -------------------------------------------------------------------------------------\n";
	echo "TEST DATES  : ";
	echo "/api/tests?from=2017-02-29&to=2017-03-29			Expected : 106   Result : ".$countDate."\n";
	echo "TEST AUTHOR : ";
	echo "/api/tests?author=Louis					Expected : 9     Result : ".$countAuthor."\n";
	echo "TEST BOTH   : ";
	echo "/api/tests?from=2017-02-29&to=2017-03-29&author=Louis	Expected : 3     Result : ".$count."\n";
	echo "TEST ID     : ";
	echo "/api/tests/125\n";
	echo "| Expected : \n"; readfile("testSaved/125.json");	
	echo "\n| Result   : \n"; readfile("testSaved/$id.json");	

?>
