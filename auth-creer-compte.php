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
<title>Créer un compte</title>
<link rel="stylesheet" href="auth-style-index.css" type="text/css" media="screen" />
<body>
 
<div id="centre">
 
<h1>Créer un compte</h1>
<form method="POST" action="#">
<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" maxlength="20" value="<?php if (!empty($_POST["pseudo"])) { echo stripcslashes(htmlspecialchars($_POST["pseudo"],ENT_QUOTES)); } ?>" /><br/>
<label for="pass">Mot de Passe : </label><input type="password" name="motdepass" maxlength="20" value="<?php if (!empty($_POST["motdepass"])) { echo stripcslashes(htmlspecialchars($_POST["motdepass"],ENT_QUOTES)); } ?>" /><br/>
<label for="email">Email : </label><input type="text" name="email" maxlength="50" value="<?php if (!empty($_POST["email"])) { echo stripcslashes(htmlspecialchars($_POST["email"],ENT_QUOTES)); } ?>" /><br/>
<label for="action">Action : </label><input type="submit" name="Envoyer" value="Envoyer" />
<input name="Effacer" value="Effacer" type="reset" />
</form>
<br/>

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
    //si l'email vide
    else if(empty($_POST['email'])){
        echo '<div id="erreur">Veuillez saisir un email!</div>';
    }
    //si l'email est invalide
    else if (!preg_match("$[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\.[a-z]{2,4}$",$_POST['email'])){
        echo '<div id="erreur">Veuillez saisir un email valide!</div>';
    }
	
	 //c'est ok
    else{
        include("auth-data_bd.php");
        connexion_bd();
        //On vérifie si le pseudo existe en bd
        $pseudo = mysqli_query($connexion,"SELECT pseudo FROM LOGIN WHERE pseudo='".mysqli_real_escape_string($connexion, stripcslashes($_POST['pseudo']))."'") or die ('Erreur :'.mysqli_error());
        if(mysqli_num_rows($pseudo) != 0)
        {
            echo '<div id="erreur">Ce pseudo est déjà utilisé!</div>'; return false;
        }
        //on vérifie si le mail existe en bd
        $email = mysqli_query($connexion,"SELECT email FROM LOGIN WHERE email='".mysqli_real_escape_string($connexion, stripcslashes($_POST['email']))."'") or die ('Erreur :'.mysqli_error());
        if(mysqli_num_rows($email) != 0)
        {
            echo '<div id="erreur">Cet email est déjà utilisé!</div>'; return false;
        }
		
		
	   //tout est ok		
		else{
		//date du jour
		$date=date("Y-m-d");
			// on enregistre les données
			$insert = mysqli_query($connexion, "INSERT INTO LOGIN VALUES ( '', '".mysqli_real_escape_string($connexion, stripcslashes(utf8_decode($connexion, $_POST['pseudo'])))."', '".mysqli_real_escape_string(stripcslashes($connexion, utf8_decode($_POST['motdepass'])))."', '".mysqli_real_escape_string($connexion, stripcslashes($_POST['email']))."', '".mysqli_real_escape_string('0')."',  '".mysqli_real_escape_string('0')."', '".mysqli_real_escape_string($connexion, $date)."' ) ");
			//Si il y a une erreur
			if (!$insert) {
				die('Requête invalide : ' . mysqli_error());
			}
			
		
		
		//pas d'erreur d'enregistrement, on envoie un mail de confirmation
			else {
				//email de celui qui envoie
				$webmaster = $email_webmaster;
				//email de celui qui reçoit
				$a_qui_j_envoie = $_POST['email'];
				//sujet
				$subject = "Valider votre inscription";
				//message   
				$msg  = "Bonjour ".stripcslashes($_POST['pseudo'])."<br/><br/>";
				$msg .= "Veuillez confirmer votre inscription en cliquant sur le lien ci-joint <a href=\"http://".$_SERVER['HTTP_HOST']."/authentification/auth-confirmation.php?pseudo=".stripcslashes($_POST['pseudo'])."&email=".$_POST['email']."\">Confirmation</a><br/>";
				$msg .= "Cordialement";
				//permet de savoir qui envoie le mail et d'y répondre
				$mailheaders = "From: $webmaster\n";
				$mailheaders .= "MIME-version: 1.0\n";
				$mailheaders .= "Content-type: text/html; charset= iso-8859-1\n";
				//on envoie l'email
				mail($a_qui_j_envoie, $subject, $msg, $mailheaders);
				
				
				
				       //confirmation et redirection
                echo '<div id="ok">Inscription réussit. Un message vous a été envoyé sur votre boîte email pour valider votre inscription.</div>                         <script type="text/javascript"> window.setTimeout("location=(\'index.php?conf=ok\');",3000) </script>';
            }      
        }               
        close_bd();   
    }
}
?>


 
<p id="lien"><a href="index.php">Connexion</a> | <a href="auth-creer-compte.php">Créer un compte</a> | <a href="auth-identifiant-perdu.php">Identifiant perdu?</a></p>
</div>
 
<noscript><div id="erreur"><b>Votre navigateur ne prend pas en charge JavaScript!</b> Veuillez activer JavaScript afin de profiter pleinement du site.</div></noscript>
 
</body>
</html>


<?php require_once 'view_parts/_footer.php'; ?>