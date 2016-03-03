<?php 
//ouverture de session
session_start();
//on vérifie si les 2 sessions sont présentes
if(isset($_SESSION['pseudo']) && isset($_SESSION['pass'])){
    include("auth-data_bd.php");
    connexion_bd();
    //on va chercher tout ce qui correspond à l'utilisateur
    $affiche = mysqli_query("SELECT * FROM LOGIN WHERE pseudo='".mysqli_real_escape_string(stripcslashes($_SESSION['pseudo']))."' AND pass='".mysqli_real_escape_string($_SESSION['pass'])."' AND valide='".mysql_real_escape_string(1)."'");
    $result = mysqli_fetch_assoc($affiche);
    //http://php.net/manual/fr/function.extract.php
    extract($result);
    //si le membre est banni en cours de session
    if($valide==2){
    echo '<div class="erreur">Votre compte a été blacklisté!</div><script type="text/javascript"> window.setTimeout("location=(\'auth.php?dec=close&ban=ok\');",3000) </script>';
    }
    //on libère le résultat de la mémoire
    mysqli_free_result($affiche);
    ?>
	
	<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Bienvenue à la Gare de Rires';
require_once 'view_parts/_header.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="fr" />
<title>Administration</title>
<link type="text/css" href="auth-style.css" rel="stylesheet"/>
</head>
 
<body>
 
<div id="cadre">
 
<?php include('auth-menu.php');?>
 
<p>Cyprum itidem insulam procul a continenti discretam et portuosam inter municipia crebra
    urbes duae faciunt claram Salamis et Paphus, altera Iovis delubris altera Veneris templo insignis.
    tanta autem tamque multiplici fertilitate abundat rerum omnium eadem Cyprus ut nullius externi indigens adminiculi
    indigenis viribus a fundamento ipso carinae ad supremos usque carbasos aedificet onerariam navem omnibusque armamentis instructam mari committat.</p>
 
</div>
 
</body>
</html>
 
<?php
//fermeture de la BD
close_bd();
//on boucle la session du haut de page
}
?>
<?php require_once 'view_parts/_footer.php'; ?>