
<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
require_once 'db/_post.php';
$site_data[PAGE_ID] = 'Espace Admin';
require_once 'view_parts/_header.php';

if ('POST' == $_SERVER['REQUEST_METHOD']) {
    //var_dump($_POST);
    // Réception et valiation des données de formulaire
    $in_post = array_key_exists('postsubmit', $_POST); //Reception de données


    //Validation TITRE
    $titre_ok = false;
    $titre_msg = '';
    if (array_key_exists('title_add', $_POST)) {
        $title = filter_input(INPUT_POST, 'title_add', FILTER_SANITIZE_MAGIC_QUOTES);
        $title = filter_var($title, FILTER_SANITIZE_STRING);

        $title_ok = true;

    }


    //Validation POST
    $post_ok = false;
    $post_msg = '';
    if (array_key_exists('post_add', $_POST)) {
        $post = filter_input(INPUT_POST, 'post_add', FILTER_SANITIZE_MAGIC_QUOTES);
        //$post = filter_var($post, FILTER_SANITIZE_STRING);

        $post_ok = strlen($post) > 3;

        if (!$post_ok) {
            $post_msg = 'Le post doit être au minimum de 3 caractères';
        }
    }


    // Réception des valeurs (titre et le text)
    if ($title_ok && $post_ok) {
        post_add($title, $post);
    }
}
?>




<div class="content_block" id="admin_content_block">
    <section>
        <h2>Post d'Administrateur / Nouvelle / Update</h2>
        <form action="#" method="post">
            <label for="title_add">Titre du post: </label>
            <input type="text" name="title_add" id="title_add"  value="<?php echo array_key_exists('title_add', $_POST) ? $_POST['title_add'] : '' ?>">
            <textarea id="post_admin" name="post_add" rows="35" value="<?php echo array_key_exists('post_add', $_POST) ? $_POST['post_add'] : '' ?>"></textarea>
            <input type="submit" value="post" name="postsubmit" class="button">
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

