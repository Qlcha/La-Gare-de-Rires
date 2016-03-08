<?php
require_once 'db/_defines.php';
$bdd = new PDO('mysql:host='.CONN_HOST.';dbname='.DBNAME, CONN_USER,CONN_PWD);

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
         <h2 class="profil_head"> Bienvenue, <?php echo $userinfo['prenom']; ?></h2>
         <p class="profil_head"><strong><?php echo $userinfo['mail']; ?></strong></p>
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         }}

         require_once 'editionprofil.php'
         ?>

<?php require_once 'view_parts/_footer.php'; ?>