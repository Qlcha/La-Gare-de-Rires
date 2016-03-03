<?php

	session_start();

	//destruction de la session

	if(isset($_GET['dec']) && $_GET['dec']=="close"){

		unset($_SESSION['pseudo']);

		unset($_SESSION['pass']);
		
		if(isset($_GET['conf']) && $_GET['conf']=="ok"){
echo '<div id="ok">Inscription réussit. Un message vous a été envoyé sur votre boîte email. Merci de cliquer sur le lien présent dans celui-ci pour valider votre inscription.</div>';
}
if(isset($_GET['valide']) && $_GET['valide']=="ok"){
echo '<div id="ok">Inscription validé avec succès! Vous pouvez vous identifier.</div>';
}
if(isset($_GET['recup']) && $_GET['recup']=="ok"){
echo '<div id="ok">Vos identifiants ont été envoyé sur votre boite email.</div>';
}
if(isset($_GET['session']) && $_GET['session']=="new"){
echo '<div id="ok">Suite à la modification de votre profil, vous devez saisir vos nouvelles données.</div>';
}
if(isset($_GET['ban']) && $_GET['ban']=="ok"){
echo '<div id="erreur">Votre compte a été black-listé!</div>';
}

	}

?>


<?php
require_once  'view_parts/Server_Conf.php';
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Connectez-vous';
require_once 'view_parts/_header.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta http-equiv="Content-Language" content="fr" />

        <title>Authentification</title>

        <!--<link rel="stylesheet" href="auth-style-index.css" type="text/css" media="screen" />-->

    </head>
	<body>
		<div id="centre">

             

            <h1>Authentification</h1>
			
			<form method="POST" action="auth.php">

				<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" maxlength="20" value="<?php if (!empty($_POST["pseudo"])) { echo stripcslashes(htmlspecialchars($_POST["pseudo"],ENT_QUOTES)); } ?>" /><br/>
			
				<label for="pass">Mot de Passe : </label><input type="password" name="motdepass" maxlength="20" value="<?php if (!empty($_POST["motdepass"])) { echo stripcslashes(htmlspecialchars($_POST["motdepass"],ENT_QUOTES)); } ?>" /><br/>
			
				<label for="action">Action : </label><input type="submit" name="Envoyer" value="Envoyer" />
			
				<input name="Effacer" value="Effacer" type="reset" />
			
			</form>

<br/>



            <p id="lien"><a href="auth.php">Connexion</a> | <a href="auth-creer-compte.php">Créer un compte</a> | <a href="auth-identifiant-perdu.php">Identifiant perdu?</a></p>

        </div>

         

        

         

        <noscript><div id="erreur"><b>Votre navigateur ne prend pas en charge JavaScript!</b> Veuillez activer JavaScript afin de profiter pleinement du site.</div></noscript>

         
		<?php

if(isset($_POST['Envoyer'])){

    //si pseudo vide

    if(empty($_POST['pseudo'])){

        echo '<div id="erreur">Veuillez saisir un pseudo!</div>';

    }

    //si mot de passe vide

    else if(empty($_POST['motdepass'])){

        echo '<div id="erreur">Veuillez saisir un mot de passe!</div>';

    }

	//c'est ok

else{

    include("auth-data_bd.php");

    connexion_bd();

    //On selectionne les données

    $index = mysqli_query("SELECT id,pseudo,pass,valide FROM LOGIN WHERE pseudo='".mysqli_real_escape_string(stripcslashes(utf8_decode($_POST['pseudo'])))."' AND pass='".mysqli_real_escape_string(utf8_decode($_POST['motdepass']))."'");

    //si pas de résultat

    if(mysqli_num_rows($index) == 0)

    {

        echo '<div id="erreur">Aucunes données ne correspond à votre saisie!</div>';

    }

	else{      

    while($result = mysqli_fetch_array($index)){

        //si le compte na pas été validé

        if($result['valide']==0){

            echo '<div id="erreur">Vous n\'avez pas validé votre inscription!<br/>» <a href="auth-valider-inscription.php?id='.$result['id'].'">Valider votre inscription</a></div>';

        }

				//si le compte a été black-listé
		
		elseif($result['valide']==2){
		
			echo '<div id="erreur">Votre compte a été black listé!</div>';
		
		}

		//si résultat

                else{

                    //on créer la session

                    $_SESSION['pseudo'] = utf8_decode($_POST['pseudo']);

                    $_SESSION['pass'] = utf8_decode($_POST['motdepass']);

                    //on redirige

                    echo '<div id="ok">Connexion réussit. Redirection en cours...</div> <script type="text/javascript"> window.setTimeout("location=(\'auth-user.php\');",3000) </script>';

                }

            }

        }

        close_bd();  

    }

}



?>


<?php require_once 'view_parts/_footer.php'; ?>

   