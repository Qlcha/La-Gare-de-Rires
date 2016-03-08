<?php
require_once 'data/_main_data.php';
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Nouvel_article';
require_once 'view_parts/_header.php';
?>

<form action="insertion_article.php" method="POST" enctype="multipart/form-data" id="post_guestbook">
    <label for="titre">Sujet:</label>
        <input type="text" name="titre" size="40" />
    <label for="photo">Choisissez une photo (max. 2Mb)</label>
    <input type="file" name="photo">
    <textarea name="commentaire" rows="3" cols="50"placeholder="Votre article ici"></textarea>
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">


    <input type="submit" name="ok" value="Envoyer" class="button">
</form>
