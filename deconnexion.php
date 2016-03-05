<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Bienvenue à la Gare de Rires';
require_once 'view_parts/_header.php';
?>

<?php
$_SESSION = array();
session_destroy();
header("Location: index.php");
?>



<?php require_once 'view_parts/_footer.php'; ?>

