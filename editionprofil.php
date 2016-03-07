<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Bienvenue à la Gare de Rires';
require_once 'view_parts/_header.php';
?>
<?php
/*session_start();*/

$bdd = new PDO('mysql:host=127.0.0.1;dbname=lagarederires', 'root', '');

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
      $newprenom = htmlspecialchars($_POST['newprenom']);
      $insertprenom = $bdd->prepare("UPDATE membres SET prenom = ? WHERE id = ?");
      $insertprenom->execute(array($newprenom, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
      $newnom = htmlspecialchars($_POST['newnom']);
      $insertnom = $bdd->prepare("UPDATE membres SET nom = ? WHERE id = ?");
      $insertnom->execute(array($newnom, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newenfant']) AND !empty($_POST['newenfant']) AND $_POST['newenfant'] != $user['nom_enfant']) {
      $newenfant = htmlspecialchars($_POST['newenfant']);
      $insertenfant = $bdd->prepare("UPDATE membres SET nom_enfant = ? WHERE id = ?");
      $insertenfant->execute(array($newenfant, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newemployer']) AND !empty($_POST['newemployer']) AND $_POST['newemployer'] != $user['numero_employer']) {
      $newemployer = htmlspecialchars($_POST['newemployer']);
      $insertemployer = $bdd->prepare("UPDATE membres SET numero_employer = ? WHERE id = ?");
      $insertemployer->execute(array($newemployer, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newdepartment']) AND !empty($_POST['newdepartment']) AND $_POST['newdepartment'] != $user['departement']) {
      $newdepartment = htmlspecialchars($_POST['newdepartment']);
      $insertdepartment = $bdd->prepare("UPDATE membres SET departement = ? WHERE id = ?");
      $insertdepartment->execute(array( $newdepartment, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newetage']) AND !empty($_POST['newetage']) AND $_POST['newetage'] != $user['etage']) {
      $newetage = htmlspecialchars($_POST['newetage']);
      $insertetage = $bdd->prepare("UPDATE membres SET etage = ? WHERE id = ?");
      $insertetage->execute(array($newetage, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newcontact']) AND !empty($_POST['newcontact']) AND $_POST['newcontact'] != $user['contact_supplementaire']) {
      $newcontact = htmlspecialchars($_POST['newcontact']);
      $insertcontact = $bdd->prepare("UPDATE membres SET contact_supplementaire = ? WHERE id = ?");
      $insertcontact->execute(array($newcontact, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newtelephone']) AND !empty($_POST['newtelephone']) AND $_POST['newtelephone'] != $user['telephone']) {
      $newtelephone = htmlspecialchars($_POST['newtelephone']);
      $inserttel = $bdd->prepare("UPDATE membres SET telephone = ? WHERE id = ?");
      $inserttel->execute(array($newtelephone, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }






   }
?>
<html>
   <head>
      <title>Edition du profil</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Edition de mon profil</h2>
         <div align="left">
            <form method="POST" action="" enctype="multipart/form-data">
               <label>Prenom :</label>
               <input type="text" name="newprenom" placeholder="Prenom" value="<?php echo $user['prenom']; ?>" /><br /><br />
               <label>Nom :</label>
               <input type="text" name="newnom" placeholder="Nom" value="<?php echo $user['nom']; ?>" /><br /><br />
               <label>Nom d'enfant :</label>
               <input type="text" name="newenfant" placeholder="nom d'enfant" value="<?php echo $user['nom_enfant']; ?>" /><br /><br />
               <label>No. d'employée :</label>
               <input type="text" name="newemployer" placeholder="No. d'employée" value="<?php echo $user['numero_employer']; ?>" /><br /><br />
               <label>Department :</label>
               <input type="text" name="newdepartment" placeholder="department" value="<?php echo $user['departement']; ?>" /><br /><br />
               <label>Étage :</label>
               <input type="text" name="newetage" placeholder="etage" value="<?php echo $user['etage']; ?>" /><br /><br />
               <label>Contact supplementaire:</label>
               <input type="text" name="newcontact" placeholder="contact supplementaire" value="<?php echo $user['contact_supplementaire']; ?>" /><br /><br />
               <label>Telephone :</label>
               <input type="text" name="newtelephone" placeholder="telephone" value="<?php echo $user['telephone']; ?>" /><br /><br />

               <label>Mail :</label>
               <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
               <label>Mot de passe :</label>
               <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
               <label>Confirmation - mot de passe :</label>
               <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
               <input type="submit" value="Mettre à jour mon profil !" />
              <!-- <a href="deconnexion.php">Se déconnecter</a>-->
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
   </body>
</html>
<?php   
}
else {
   header("Location: connexion.php");
}
?>
<?php require_once 'view_parts/_footer.php'; ?>
