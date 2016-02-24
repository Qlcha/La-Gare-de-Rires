<?php
if(!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];   }?>

<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="UTF-8">
    <title><?= SITE_NAME . ' - ' . $site_data[PAGE_ID]?></title>

        <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css"/>
    <!--[if lt IE 9]>
    <script
        src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body><!--
--><header><!--
--><nav><!--
--><ul><li><a href="index.php"><img src="images/Train.png" alt="logo LaGareDeRires"></a>
            <h1>La Gare de Rires</h1></li>
                <li><a href="equipe.php">Notre équipe</a></li><!--
                --><li><a href="gallery.php">Gallerie</a></li><!--
                --><li><a href="guestbook.php">Guestbook</a></li><!--
                --><li><a href="documents.php">Documens</a></li><!--
                --><li><a href="contact.php">Contact</a></li><!--
                -->
            </ul>
        </nav>
    </header>
