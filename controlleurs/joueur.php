<?php
if(!est_joueur()) header("location:".WEB_ROUTE.'?controlleurs=security&view=connexion');
if ($_SERVER['REQUEST_METHOD']== 'GET') {
    if(isset($_GET['view'])){
        if ($_GET['view']=='jeu') {
            require_once(ROUTE_DIR.'view/joueur/jeu.html.php');
        }
    }else {
        require_once(ROUTE_DIR.'view/security/connexion.html.php');
    }
}
?>