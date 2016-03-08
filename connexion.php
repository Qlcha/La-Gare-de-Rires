<?php
require_once '_defines.php';
require_once 'db/_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Connexion';
require_once 'view_parts/_header.php';
?>

	<?php

$bdd = new PDO('mysql:host='.CONN_HOST.';dbname='.DBNAME, CONN_USER,CONN_PWD);


if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
       if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['prenom'] = $userinfo['prenom'];
         $_SESSION['mail'] = $userinfo['mail'];
           if($_SESSION['mail'] == 'admin@admin.com')
           {
               header('Location: admin.php');
           }else
         header("Location: profil.php?id=".$_SESSION['id']);
           exit;
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
   <body><!---
     --><div class="formulaire connexion content_block" id="connexion">
         <form method="POST" action="">
             <h2>Connexion</h2>
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br />
            <input type="submit" name="formconnexion" value="Se connecter!" class="button" />

         </form>
      </div><!--

         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>

--><div class="formulaire">
<?php require_once 'inscription.php'?></div>

<?php require_once 'view_parts/_footer.php'; ?>
