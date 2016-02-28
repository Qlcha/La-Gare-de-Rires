<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Bienvenue à la Gare de Rires';
require_once 'view_parts/_header.php';
?>

<section class="content_block" id="news">
    <p>jj / mm / 2016</p>
    <h3>Titre du post</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
        laborum.</p>
</section>
<aside class="content_block">
    <section id="repas" class="du_jour">
        <h3>Repas du jour:</h3>
        <p><strong>Collation du matin : </strong>CEREALES MULTI GRAIN, POMMES & LAIT</p>
        <p><strong>Dîner : </strong>GALETTES DE THON JARDINIERE, LEGUMES FRAIS & SALADE AUX EPINARDS; CANTELOUP & LAIT</p>
        <p><strong>Collation aprés-midi : </strong>BAGELS MULTI-GRAIN AVEC FROMAGE CHEDDAR, POMMES, LAIT</p>
        <a href="menu_3_semaines.php" class="button">Consulter le Menu</a>

    </section>
    <section id="activite" class="du_jour">
        <h3>Activité du jour:</h3>
        <a href="download/calendrier.pdf" class="button">Consulter le Calendrier</a>
    </section>
</aside>


<section id="phylosophy">
    <h3>Notre philosophie...</h3>
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


<!-- <div> <? /*= $site_data[PAGE_ID] */ ?></div>-->

<?php require_once 'view_parts/_footer.php'; ?>

