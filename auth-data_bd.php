<?php
	function connexion_bd(){
		$nom_du_serveur ="localhost";
		$nom_de_la_base ="lagarederires";
		$nom_utilisateur ="root";
		$passe ="";
		
		@$link = mysqli_connect($nom_du_serveur,$nom_utilisateur,$passe,$nom_de_la_base);
		@mysqli_set_charset($link,"utf8");
		//printf("Jeu de caractères courant : %s\n", mysqli_character_set_name($link));
		if (mysqli_connect_errno($link)) {
			echo "Echec lors de la connexion à MySQL : " . mysqli_connect_error($link);
			exit();
		}
		return $link;
	}
	$connexion = connexion_bd();
?>