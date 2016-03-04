<?php
require_once 'data/_main_data.php';
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Guestbook';
require_once 'view_parts/_header.php';
?>

<h2>Blog : Faites part de vos points de vues ou articles ici !!!!</h2>
<!--<hr />-->
<?php

$connect = mysqli_connect("127.0.0.1", "root", "", "lagarederires");

/* Vérification de la connexion */
if (!$connect) {
    echo "Échec de la connexion : ".mysqli_connect_error();
    exit();
}

$requete = "SELECT * FROM article_blog ORDER BY ID DESC ";
if ($resultat = mysqli_query($connect,$requete)) {
    date_default_timezone_set('America/Montreal');
    /* fetch le tableau associatif */
    while ($ligne = mysqli_fetch_assoc($resultat)) {
        $dt_debut = date_create_from_format('Y-m-d H:i:s', $ligne['date']);
        echo "<div class='content_block'> <h4>Le ".$dt_debut->format('d/m/Y H:i:s')."</h4>";



        echo "<h3>".' Titre article : '.$ligne['titre']."</h3>";
        echo "<div style='width:400px'>".$ligne['commentaire']." </div> ";
        if ($ligne['photo'] != "") {
            echo "<img src='photo/".$ligne['photo']."' width='200px'/>";
        }
echo "</div>";
       /* echo "<hr />";*/
    }
}
?>
<br />
<a href="formulaire_ajout.php" >Ajouter un article</a>


<?php require_once 'view_parts/_footer.php'; ?>
