<?php
require_once 'data/_main_data.php';
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Guestbook';
require_once 'view_parts/_header.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Blog</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h2>Blog : Faites part de vos points de vues ou articles ici !!!!</h2>
<!--<hr />-->
<?php
$connect = mysqli_connect("127.0.0.1", "root", "", "lagarederires");

/* Vérification de la connexion */
if (!$connect) {
    echo "Échec de la connexion : ".mysqli_connect_error();
    exit();
}

$requete = "SELECT * FROM article_blog ORDER BY Date";
if ($resultat = mysqli_query($connect,$requete)) {
    date_default_timezone_set('america/montreal');
    /* fetch le tableau associatif */
    while ($ligne = mysqli_fetch_assoc($resultat)) {
        $dt_debut = date_create_from_format('Y-m-d H:i:s', $ligne['date']);
        echo "<h3>".$ligne['titre']."</h3>";
        echo "<h4>Le ".$dt_debut->format('d/m/Y H:i:s')."</h4>";
        echo "<div style='width:400px'>".$ligne['commentaire']." </div>";
        if ($ligne['photo'] != "") {
            echo "<img src='photo/".$ligne['photo']."' width='200px' height='200px'/>";
        }
       /* echo "<hr />";*/
    }
}
?>
<br />
<a href="formulaire_ajout.php" >Ajouter un article</a>
</body>
</html>

<?php require_once 'view_parts/_footer.php'; ?>
