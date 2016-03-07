<?php
/**
 *  Opérations sur les produits
 * 	- ajout de produit
 * 	- lister les catégories de produits
 * 	- lister les produits, tous ou par catégorie
 */
require_once('_conn.php');
require_once('_common.php');


/**
 * Liste des colonnes de la table post
 */
define('POST_TP_COL_ID', 'id');
define('POST_TP_COL_SUBMITDATE', 'submitdate');
define('POST_TP_COL_TITLE', 'title');
define('POST_TP_COL_TEXT', 'text');
$post_tb_cols = array(
    POST_TP_COL_ID,
    POST_TP_COL_SUBMITDATE,
    POST_TP_COL_TITLE,
    POST_TP_COL_TEXT,
);

/**
 *  Insertion (ajout) d'un nouveau post
 */
function post_add($title, $text) {
    global $pdo, $post_tb_cols;
    $resultat = false; // Mode défensif
    $queryStr = 'INSERT INTO ' . TB_POST . '(' . get_tb_cols($post_tb_cols) . ') VALUES (' . get_tb_cols($post_tb_cols, COLON_CAR) . ')';
    $sth = $pdo->prepare($queryStr);
    $params = array(
        COLON_CAR . POST_TP_COL_SUBMITDATE => date('Y-m-d H:i:s'),
        COLON_CAR . POST_TP_COL_TITLE => $title,
        COLON_CAR . POST_TP_COL_TEXT => $text,
    );
    $res = $sth->execute($params);
//    $sth->debugDumpParams();
//    var_dump($params);
//    var_dump($res);
    if ( ! $res || ($sth->rowCount()  == 0)) {
        $errorInfo = $sth->errorInfo();
        $errorInfo = $errorInfo[0];
        throw new Exception("Echec lors de la tentative d'ajout du post $title : (" . $errorInfo . ")<br/>");
    }
    $inserted_post_id = $pdo->lastInsertId();
    if ($res) {
        $resultat = $inserted_post_id;
    };
    return $resultat;
}


/**
 * Lister (parcourir) ou rechercher les posts

 */
function post_list($order = 'DESC') {
    global $pdo;
    $resultat = false; // Par défaut n'existe pas
    $queryStr = 'SELECT * FROM ' . TB_POST;
    if (($order == 'DESC') || ($order == 'ASC')) {
        $queryStr .= ' ORDER BY ' . POST_TP_COL_SUBMITDATE . ' ' . $order;
    }
    //var_dump($queryStr);
    try {
        $sth = $pdo->prepare($queryStr);
        $params = array();
        $res = $sth->execute($params);
//        $sth->debugDumpParams();
//        var_dump($res);
//        var_dump($sth->rowCount());
    } catch (PDOException $e) {
        echo "Echec tentative lister posts : (" . $e->getMessage() . ')<br/>';
        exit();
    }
    if ($res && ($sth->rowCount() > 0)) {
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    return $resultat;
}
