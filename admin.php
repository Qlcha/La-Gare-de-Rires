
<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Espace Admin';
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst($site_data[PAGE_ID])?></title>

    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css"/>
    <!--[if lt IE 9]>
    <script
        src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- fonts  -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:400,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,400italic' rel='stylesheet' type='text/css'>
    <!--end fonts  -->


  <!--  SCRIPT FOR TEXT EDITOR-->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>

<body><!--
--><div id="principal"><!--
--><header><!--

--><nav><!--
--><ul><li><a href="index.php"><img src="images/Train.png" alt="logo LaGareDeRires"><!--
                        --><h1>La Gare de Rires</h1></a></li><!--
                --><li><a href="equipe.php">Notre équipe</a></li><!--
                --><li><a href="gallery.php">Gallerie</a></li><!--
                --><li><a href="guestbook.php">Guestbook</a></li><!--
                --><li><a href="documents.php">Documents</a></li><!--
                --><li><a href="contact.php">Contact</a></li><!--
                -->
            </ul>
        </nav>

        <div><a href="connexion.php" class="button" id="button_connexion">Connextion</a></div>

    </header>


<div class="content_block">
    <section>
        <h2>Post d'Administrateur / Nouvelle / Update</h2>
        <form action="#">
            <textarea>Easy (and free!) You should check out our premium features.</textarea>
            <input type="submit" value="post" class="button">
        </form>
    </section>

<section id="pdf_upload">
        <h2>Mise à jour de Calendrier</h2>
        <input type="file" id="fichier_calendrier">
    </section>

    <section>
        <h2>Utilisateurs inscrits au site</h2>
        <table class="table" id="table_users">
            <tr>
                <th>No.</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Nom d'enfant</th>
                <th>No. d'employée CN</th>
                <th>Départament</th>
                <th>Étage</th>
                <th>Contact suplementaire</th>
                <th>Téléphone</th>
                <th>Courrier</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Olga</td>
                <td>Paquette</td>
                <td>Simon</td>
                <td>3016</td>
                <td>Development WEB</td>
                <td>12</td>
                <td>514-343-18-43</td>
                <td>514-515-11-46</td>
                <td>olga.sphere@gmail.com</td>
            </tr>
        </table>

    </section>

</div>

