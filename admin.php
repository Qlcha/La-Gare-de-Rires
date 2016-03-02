
<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Espace Admin';
require_once 'view_parts/_header.php';

var_dump($_POST);

// Réception des valeurs (titre et le text)
//post_add()


?>


<div class="content_block" id="admin_content_block">
    <section>
        <h2>Post d'Administrateur / Nouvelle / Update</h2>
        <form action="#" method="post">
            <label for="title_add">Titre du post: </label>
            <input type="text" name="title_add" id="title_add">
            <textarea id="post_admin" name="post_add">Easy (and free!) You should check out our premium features.</textarea>
            <input type="submit" value="post" class="button">
        </form>
    </section>

<section id="pdf_upload">
        <h2>Mise à jour de Calendrier: </h2>
        <input type="file" id="fichier_calendrier">
    </section>

    <section>
        <h2>Utilisateurs inscrits au site:</h2>
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

