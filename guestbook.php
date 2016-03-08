<?php

require_once 'data/_main_data.php';
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Guestbook';
require_once 'view_parts/_header.php';

if($_SESSION['mail'] == null)
{
    header('Location: alert.php');
    exit();
}

?>
<div class="update">
<h2>Blog : Faites part de vos points de vues ou articles ici !!!!</h2>
<!--<a href="formulaire_ajout.php" >Ajouter un article</a>-->
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

    }
}
?>
<br />
<a href="formulaire_ajout.php" >Ajouter un article</a>


</div>

<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add fancyBox -->
<script type="text/javascript" src="fancyapps/source/jquery.fancybox.pack.js"></script>


<!-- script affichage PDF -->
<script>
    $(".fancybox").fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        iframe : {
            preload: false
        }
    });
</script>


</body>



</html>