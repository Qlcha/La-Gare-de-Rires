<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Bienvenue à la Gare de Rires';
require_once 'view_parts/_header.php';
?>

<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=lagarederires', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>Page de Profil</title>
      <meta charset="utf-8">
   </head>
   <body>
		<a href="deconnexion.php" class="button" id="button_connexion">Déconnexion</a>
      <div align="center">
         <h2> Profil de <?php echo $userinfo['prenom']; ?></h2>
         <br /><br />
         Prenom =<strong><?php echo $userinfo['prenom']; ?></strong>
         <br />
         Mail = <strong><?php echo $userinfo['mail']; ?></strong>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil </a> </br>
         <a href="deconnexion.php">Se déconnecter</a>
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>



<?php require_once 'view_parts/_footer.php'; ?>

