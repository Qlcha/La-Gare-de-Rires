<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'page_blog.php';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Guestbook</title>
</head>
<style>
    form
    {
        text-align:center;
    }
</style>
<body>

<form action="page_blog_post.php" method="post">
    <p>
        <label for="prénom">Prénom</label> : <input type="text" name="prénom" id="prénom" /><br />
        <label for="message">Message</label> :  <textarea cols="50" rows="8" id="commentaire" name="commentaire" ></textarea>

        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=lagarederires;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Récupération des 20 derniers messages

$reponse = $bdd->query('SELECT prénom, commentaire FROM message ORDER BY ID DESC LIMIT 0, 20');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

while ($donnees = $reponse->fetch()) {

    echo '<p><strong>'.htmlspecialchars($donnees['prénom'].' a commenté : ').htmlspecialchars($donnees['commentaire']). '</strong></p>';

}

$reponse->closeCursor();

?>
</body>
</html>
