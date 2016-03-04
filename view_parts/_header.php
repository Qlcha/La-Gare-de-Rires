<?php

if(!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];   }
date_default_timezone_set('America/Montreal')?>

<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="UTF-8">
    <title><?php echo ucfirst($site_data[PAGE_ID])?></title>

        <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css"/>

    <link rel="stylesheet" href="fancyapps/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="fancyapps/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="fancyapps/source/jquery.fancybox.css" type="text/css" media="screen" />

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
    <script>tinymce.init({ selector:'#post_admin' });</script>

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

 <div>
    <!-- <?php /*if(empty($_SESSION["user"])){ */?>
         <form class="navbar-form navbar-right" method="post" id="loginForm" action="Connecter.php">
         <div class="form-group">
             <input type="text" name="email" placeholder="Email"
                    value="" class="form-control " />
         </div>
         <div class="form-group">
             <input type="password" name="pass" placeholder="Password"
                    value=""
                    class="form-control " />
         </div>

     </form>
     --><?php /*} */?>
     <a href="connexion.php" class="button" id="button_connexion">connexion</a>
     <!--<a href="inscription.php" class="button" id="button_connexion">Inscription</a>-->
 </div>




    </header>
