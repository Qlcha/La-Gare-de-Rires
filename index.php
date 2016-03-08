<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Bienvenue à la Gare de Rires';
require_once 'view_parts/_header.php';
require_once 'db/_post.php';
$posts = post_list();
?>

<div class="update">
<section class="content_block" id="news">
    <p><?php echo $posts[0]['submitdate'] ?></p>
    <h3><?php echo $posts[0]['title'] ?></h3>
    <p><?php echo $posts[0]['text'] ?></p>
</section>


<aside id="du_jour">
    <section id="repas" class="du_jour content_block">
        <h3>Repas du jour:</h3>
        <ul>
            <li>Collation du matin :</li>
            <li>CEREALES MULTI GRAIN, POMMES & LAI</li>
            <li>Diner :</li>
            <li>GALETTES DE THON JARDINIERE, LEGUMES FRAIS & SALADE AUX EPINARDS; CANTELOUP & LAIT</li>
            <li>Collation aprés-midi : </li>
            <li>BAGELS MULTI-GRAIN AVEC FROMAGE CHEDDAR, POMMES, LAIT</li>
        </ul>

        <a href="menu_3_semaines.php" class="button">Consulter le Menu</a>
    </section>


    <section id="activite" class="du_jour content_block">
        <h3>Activité du jour:</h3>
        <a class="fancybox button" data-fancybox-type="iframe" href="download/calendrier.pdf">Consulter le Calendrier</a>
    </section>
</aside>
</div>

<section id="phylosophy">
    <h3>Notre philosophie :    <span>  Sur la voie de l'avenir...</span></h3>
    <p>Votre CPE a beaucoup à vous offrir, autant dans l'éducation social de votre enfant que dans les multiples
        activités
        que nous partagerons avec vous au cours de l'année.</p>
    <p>
        Nous offrons à tous les enfants un programme éducatif leur parmettant: de faire des choix appropriés en fonction
        de leur âge, de développer des habiletés sociales afin de vivre en harmonie avec leur milieu, de développer leur
        créativité, de susciter un intérêt pour la lecture et les arts, apprendre à échanger avec les amis sur leur
        apprentissage,
        de gérer leur conflit et finalement de découvrir de nouveaux horizons.
    </p>

    <p>Nous vous présenton, cette année de 35 aniversaire de notre CPE, ce site web contenant toutes les informations
        qui
        vous orienteront sur le bon fonctionnement de la garderie pour chacun des groupes. Celui-ci a été créé dans le
        but
        de vous assister tout au long de l'année. Prenez quelque minutes pour le parcourir!
    </p>
</section>



<?php require_once 'view_parts/_footer.php'; ?>

