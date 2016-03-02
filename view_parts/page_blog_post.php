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

// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO message (prénom , commentaire ) VALUES(?, ?))');

// execution du message
$req->execute(array($_POST['prénom'], $_POST['commentaire']));
header('Location: page_blog.php');
?>