<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Espace Admin';
require_once 'view_parts/_header.php';
?>

<div class="content_block">
    <section>
        <h2>Post d'Administrateur / Nouvelle / Update</h2>
        <form action="#">
            <textarea name="message_admin" placeholder="Post d'admin ici" class="input" rows="5"></textarea>
            <input type="submit" value="post" class="button">
        </form>
    </section>

    <section>
        <h2>Mise à jour de Calendrier</h2>
        <input type="file" id="fichier_calendrier">
    </section>

    <section>
        <h2>Utilisateurs inscrits au site</h2>
        <table>
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

