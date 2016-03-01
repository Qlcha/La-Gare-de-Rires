<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'page_blog_post.php';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <title> CHAT </title>
</head>

<body>
<div class="contener">


    <h1 id="titre"> Faites de votre point de vue ! </h1>


    <form action= "#" method="post">

        <p class="form-group">

            <input type="text" name="prénom" id= "prénom" placeholder="" value="<?php echo !empty($_SESSION["user"])?$user->username:"";?>"/>
        </p>


        <p class="form-group">

            <textarea cols="10" rows="8" class="form-control" id="commentaire" name="commentaire" placeholder="Laissez votre commentaire"></textarea>
            <br>

        <p class="form-group"><input type="submit" id="soumet" name="soumet" value="Soumettre" /></p>

    </form>
</div >

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

// Récupération des 20 derniers messages

$reponse = $bdd->query('SELECT prénom, commentaire , DATE_FORMAT(date_ca, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_ca FROM message ORDER BY ID DESC LIMIT 0, 20');
//var_dump($reponse);
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)


while ($donnees = $reponse->fetch()) {

    //var_dump($donnees);
    //Envoi de l'image du profil qui a envoyer un commentaire.

    echo '<img  src="images/' .htmlspecialchars($donnees['prénom']). '.jpg" alt="Logo_compagnie" style="width:120px;height:120px;"/>';
    echo '<p>' .' le ' . htmlspecialchars($donnees['date_ca']). '</p>' ;
    echo '<div class="well">'.'<p>'.htmlspecialchars($donnees['prénom'].' a commenté : ').htmlspecialchars($donnees['commentaire']). '</p>'.'</div>';

}

$reponse->closeCursor();

?>
</body>
</html>



