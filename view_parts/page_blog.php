<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'page_blog_post.php';
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
        <label for="message">Message</label> :  <textarea cols="10" rows="8" class="form-control" id="commentaire" name="commentaire" ></textarea>

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

$reponse = $bdd->query('SELECT prénom, commentaire FROM lagarederires ORDER BY ID DESC LIMIT 0, 20');
//var_dump($reponse);
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)



while ($donnees = $reponse->fetch()) {

    echo '<p>'.htmlspecialchars($donnees['prénom'].' a commenté : ').htmlspecialchars($donnees['commentaire']). '</p>';

}

$reponse->closeCursor();

?>
</body>
</html>
