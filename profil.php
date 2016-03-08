<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=lagarederires', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();

require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Profil de '.  $userinfo['prenom'];
require_once 'view_parts/_header.php';

?>
         <h2> Bienvenue <?php echo $userinfo['prenom']; ?></h2>
         <p><strong><?php echo $userinfo['mail']; ?></strong></p>
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         }}

         require_once 'editionprofil.php'
         ?>

<?php require_once 'view_parts/_footer.php'; ?>