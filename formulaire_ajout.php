<?php
require_once 'data/_main_data.php';
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Nouvel_article';
require_once 'view_parts/_header.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h2>Nouvel article</h2>
<form action="insertion_article.php" method="POST" enctype="multipart/form-data">
    <p>Titre de l'article: <input type="text" name="titre" size="40" /></p>
    <p>Commentaire: <br /><textarea name="commentaire" rows="10" cols="50"></textarea></p>
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
    <p>Choisissez une photo avec une taille inférieure à 2 Mo.</p>
    <input type="file" name="photo">
    <br /><br />
    <input type="submit" name="ok" value="Envoyer">
</form>
<br />
<a href="guestbook.php" >VISITEZ LE BLOG</a>
</body>
</html>
<?php require_once 'view_parts/_footer.php'; ?>