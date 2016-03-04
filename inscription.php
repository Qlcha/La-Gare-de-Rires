<?php 
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=lagarederires','root', '');
	
	if(isset($_POST['forminscription'])) {
   $prenom = htmlspecialchars($_POST['prenom']);
   $nom = htmlspecialchars($_POST['nom']);
        $nom_enfant = htmlspecialchars($_POST['nom_enfant']);
        $numero_employer = htmlspecialchars($_POST['numero_employer']);
        $department = htmlspecialchars($_POST['departement']);
        $etage = htmlspecialchars($_POST['etage']);
        $contact_supplemantaire = htmlspecialchars($_POST['contact_supplementaire']);
        $telephone = htmlspecialchars($_POST['telephone']);
   $mail = htmlspecialchars($_POST['mail']);
   if(isset($_POST['mail2'])){
   $mail2 = htmlspecialchars($_POST['mail2']);
	}
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2'])
       AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $prenomlength = strlen($prenom);
      if($prenomlength <= 255) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(prenom, mail, motdepasse, nom, nom_enfant, numero_employer, departement, etage, contact_supplementaire, telephone) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                     $insertmbr->execute(array($prenom, $mail, $mdp, $nom, $nom_enfant, $numero_employer, $department, $etage, $contact_supplemantaire, $telephone));



                     $erreur = "Votre inscription a bien été validée ! <a href=\"connexion.php\">Veuillez vous connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre prenom ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
	
?>

<?php
/*require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Bienvenue à la Gare de Rires';
require_once 'view_parts/_header.php';
*/?>

<div class="formulaire">
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">
            <table>
               <tr>
                  <td>
                     <label for="prenom">Prenom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                  </td>
               </tr>

                <tr>
                    <td>
                        <label for="nom">Nom :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="nom_enfant">Nom enfant :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Nom de votre enfant" id="nom_enfant" name="nom_enfant" value="<?php if(isset($nom_enfant)) { echo $nom_enfant; } ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="numero_employer">Numero employer :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Numero employer" id="numero_employer" name="numero_employer" value="<?php if(isset($numero_employer)) { echo $numero_employer; } ?>" />
                    </td>
                </tr>

               <tr>
                    <td>
                        <label for="departement">Departement :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Votre departement" id="departement" name="departement" value="<?php if(isset($departement)) { echo $departement; } ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="etage">Etage :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Votre etage" id="etage" name="etage" value="<?php if(isset($etage)) { echo $etage; } ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="contact_supplementaire">Contact supplemenataire :</label>
                    </td>
                    <td>
                        <input type="tel" pattern="^\(?\d{3}\)?(-| )?\d{3}(-| )?\d{4}$" placeholder="Votre contact supplementaire" id="contact_supplementaire" name="contact_supplementaire" value="<?php if(isset($contact_supplementaire)) { echo $contact_supplementaire; } ?>" />
                    </td>
                </tr>

                <tr>
                <!-- contrôle avec regex pour un numéro au format 123-123-1234 -->

                    <td>
                        <label>Téléphone </label>
                    </td>
                    <td>
                        <input type="tel" pattern="^\(?\d{3}\)?(-| )?\d{3}(-| )?\d{4}$" placeholder="Telephone" id="telephone" name="telephone" value="<?php if(isset($telephone)) { echo $telephone; } ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="mail">Mail :</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                    </td>
                </tr>

               <tr>
                  <td>
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td>
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td>
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td>
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" class="button"/>
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>

<?php /*require_once 'view_parts/_footer.php'; */?>

