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
<title>Identifiant perdu</title>
<link rel="stylesheet" href="auth-style-index.css" type="text/css" media="screen" />
<body>
 
<div id="centre">
<h1>Identifiant perdu</h1>
<form method="POST" action="#">
<label for="email">Email : </label><input type="text" name="email" maxlength="50" value="<?php if (!empty($_POST["email"])) { echo stripcslashes(htmlspecialchars($_POST["email"],ENT_QUOTES)); } ?>" /><br/>
<label for="action">Action : </label><input type="submit" name="Envoyer" value="Envoyer" />
<input name="Effacer" value="Effacer" type="reset" />
</form>
<br/>
 
<p id="lien"><a href="auth.php">Connexion</a> | <a href="auth-creer-compte.php">Créer un compte</a> | <a href="auth-identifiant-perdu.php">Identifiant perdu?</a></p>
</div>
 
<noscript><div id="erreur"><b>Votre navigateur ne prend pas en charge JavaScript!</b> Veuillez activer JavaScript afin de profiter pleinement du site.</div></noscript>
 
</body>
</html>

<?php
if(isset($_POST['Envoyer'])){
    //si l'email vide
    if(empty($_POST['email'])){
        echo '<div id="erreur">Veuillez saisir un email!</div>';
    }
    //si l'email est invalide
    else if (!preg_match("$[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\.[a-z]{2,4}$",$_POST['email'])){
        echo '<div id="erreur">Veuillez saisir un email valide!</div>';
    }
    //c'est ok
    else{
        //connexion à la bd
        include("auth-data_bd.php");
        connexion_bd();
        //On sélectionne les données
        $index = mysql_query("SELECT pseudo,pass FROM LOGIN WHERE email='".mysql_real_escape_string(stripcslashes($_POST['email']))."'");
        //si pas de résultat
        if(mysql_num_rows($index) == 0)
        {
            echo '<div id="erreur">Aucunes données ne correspond à votre saisie!</div>';
        }
        //si c'est ok
        else{
        //on boucle pour récupérer le pseudo et pass du membre pour lui envoyer
            while($result = mysql_fetch_array($index)){
                //email de celui qui envoie
                $webmaster = $email_webmaster;
                //email de celui qui reçoit
                $a_qui_j_envoie = $_POST['email'];
                //sujet
                $subject = "Vos identifiants";
                //message   
                $msg  = "Bonjour ".$result['pseudo']."<br/><br/>";
                $msg .= "Vous avez demandé à recevoir vos identifiants :<br/>Pseudo : ".htmlspecialchars($result['pseudo'])."<br/>Mot de passe : ".$result['pass']."<br/><br/>";
                $msg .= "Cordialement";
                //permet de savoir qui envoie le mail et d'y répondre
                $mailheaders = "From: $webmaster\n";
                $mailheaders .= "MIME-version: 1.0\n";
                $mailheaders .= "Content-type: text/html; charset= iso-8859-1\n";
                //on envoie l'email
                mail($a_qui_j_envoie, $subject, $msg, $mailheaders);
                //on laisse un message de confirmation                
                echo '<div id="ok">Vos identifiants ont été envoyé sur votre boite email.</div>                         <script type="text/javascript"> window.setTimeout("location=(\'auth.php?recup=ok\');",3000) </script>';
            }
        }
        close_bd();    
    }
}
?>

<?php require_once 'view_parts/_footer.php'; ?>