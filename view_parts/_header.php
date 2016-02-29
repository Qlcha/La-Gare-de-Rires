<?php
if(!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];   }?>

<!DOCTYPE html>
<html>
<head lang="fr">
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

</head>
<body><!--
--><ul><!--
       --><li class="lang"><a href="index.php">Eng</a></li><!--
       --><li class="lang"><a href="index.php">Fr</a></li><!--
       --></ul><!--
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
