<?php
require_once 'data/_main_data.php';
require_once '_defines.php';
/*session_start();
if(!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
}else{
    header('Location: alert.php');}*/

require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Guestbook';
require_once 'view_parts/_header.php';
?>

<?php require_once 'view_parts/page_blog.php'; ?>

<?php require_once 'view_parts/_footer.php'; ?>
