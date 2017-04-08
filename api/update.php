<?php

	// Pour les accents
	header('Content-Type: text/html; charset=utf-8');

	// On charge la bibliothèque d'analyse HTML
	require_once "simple_html_dom/simple_html_dom.php";

	// URL du site VDM
	$url = 'http://www.viedemerde.fr/?page=';
	
	// Tableau pour stocker les données
	$posts = array();
	
	// Comme chaque page retourne 10 VDMs, on le fait 10 fois
	for ($page = 1; $page <= 20; $page++) {

		// On récpère le contenu
		$content = file_get_html($url.$page);

		// On récupère le contenu des VDMs que l'on met dans un tableau
		$i = (($page-1)*10)+1;
		foreach($content->find('article[class=art-panel col-xs-12] p[class=block] a') as $article) {
			$posts[$i]['content'] = $article->plaintext;
			$i++;
		}

		// On récupère les auteurs
		$i = (($page-1)*10)+1;
		foreach($content->find('article[class=art-panel col-xs-12] div[class=text-center]') as $author) {
			$posts[$i]['author'] = substr(array_values(explode('-', $author->plaintext))[0], 5, -1);
			$i++;
		}

		// On récupère les auteurs dates
		$i = (($page-1)*10)+1;
		$months = array("janvier"=>1, "février"=>2, "mars"=>3, "avril"=>4, "mai"=>5, "juin"=>6, "juillet"=>7, "août"=>8, "septembre"=>9, "octobre"=>10, "novembre"=>11, "décembre"=>12);
		foreach($content->find('article[class=art-panel col-xs-12] div[class=text-center]') as $date) {
			
			// On formatte la date
			$vdm_date = substr(array_values(explode('/', $date->plaintext))[1], 1, -1);
			$re = '/([a-z]+) ([0-9]+) ([a-zéû]+) ([0-9]{4}) ([0-9]{1,2}):([0-9]{1,2})/i'; // Expression régulière pour les dates du site VDM
			preg_match_all($re, $vdm_date, $matches, PREG_SET_ORDER, 0);
			$timestamp = mktime($matches[0][5], $matches[0][6], 0, $months[$matches[0][3]], $matches[0][2], $matches[0][4]); // Comme on ne connait pas les secondes, on met 0
			
			$posts[$i]['date'] = date("Y-m-d H:i:s", $timestamp);
			$i++;
		}
		
	}
	
	// On enregistre les données en JSON dans des fichiers
	if (!is_dir("saved")) {
		mkdir("saved");
	}
	for ($i = 1; $i <= 200; $i++) {
		
		$posts[$i]['id'] = $i;
		file_put_contents("saved/$i.json", json_encode($posts[$i]));
		
	}
	
	echo "done.";

?>