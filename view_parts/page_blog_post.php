<?php
// Connexion à la base de données

try
{
    $bdd=new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSEWORD);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO message(prénom , commentaire , date_ca) VALUES(?, ?, NOW())');

// execution du message
$req->execute(array($_POST['prénom'], $_POST['commentaire']));

?>