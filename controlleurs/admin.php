<?php

if(!est_admin()){
    header("location:".WEB_ROUTE.'?controlleurs=security&view=connexion');
}elseif (est_admin()) {
    if ($_SERVER['REQUEST_METHOD']== 'GET') {
        if(isset($_GET['view'])){
            
            if ($_GET['view']=='liste.question') {
                require_once(ROUTE_DIR.'view/admin/liste.question.html.php');
            }elseif ($_GET['view'] == 'create.question') {
                require(ROUTE_DIR.'view/admin/create.question.html.php');
                
            }elseif($_GET['view'] == 'liste.joueur'){
                require(ROUTE_DIR. 'view/admin/liste.joueur.html.php');
            }elseif($_GET['view'] == 'create.admin'){
                require(ROUTE_DIR.'view/admin/create.admin.html.php');
            }
        }else {
            require_once(ROUTE_DIR.'view/security/connexion.html.php');
            exit;
        }
 }
 elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['action'])){
            if ($_POST['action']== "create.question") {
               if (isset($_POST["btn_submit"])) {
                   unset ($_POST['controlleurs']);
                   unset ($_POST['action']);
                   unset ($_POST['btn submit']);
                   question($_POST)['cree'];
                 header("location:".WEB_ROUTE.'?controlleurs=admin&view=create.question');
                 exit();

               }
            }elseif ($_POST['action'] == 'create.admin') {
                unset($_POST["action"]);
                unset($_POST["btn_submit"]);
                inscription($_POST);
                
            }
        }
       
    }
}
    
    
    



function question( array $adquest):void{
    $arrayError = [];
    extract($adquest);
    valid_question($chaine ,'quest',$arrayError);
    valid_num ($num ,'point',$arrayError);
    valid_choix($choice ,'choice',$arrayError);
    valid_num($num ,'nbr_de_champ',$arrayError);
    die("moi");
    if (est_vide($num , $choice , $chaine)) {
        $_SESSION['arrayError'] = $arrayError;
        header("location:".WEB_ROUTE.'?controlleurs=admin&view=create.question');
    }
    if (form_valid ($arrayError)){
        cree_quest($adquest);
        header("location:".WEB_ROUTE.'?controlleurs=admin&view=create.question');

    }else{
        $_SESSION['arrayError']= $arrayError;
        header("location:".WEB_ROUTE.'?controlleurs=admin&view=create.question');
    }
} 

function inscription(array $data): void {
    $arrayError = [];
    extract($data);
    validation_login($login, 'login', $arrayError);
    validation_password($password, 'password', $arrayError);
    validation_champ($prenom, 'prenom', $arrayError);
    validation_champ($nom, 'nom', $arrayError);
    if ($password!= $confirmpassword) {
        $arrayError['confirmpassword'] = 'la confirmation password est obligatoire';
    }
    if (est_vide($prenom , $nom)) {
        $_SESSION['arrayError'] = $arrayError;
        header("location:".WEB_ROUTE.'?controlleurs=admin&view=create.admin');
    }
    if (form_valid($arrayError)) {
        $data['role'] = 'ROLE_ADMIN';
        
        add_user($data);
        header("location:".WEB_ROUTE.'?controlleurs=admin&view=create.admin');
    }else{
        $_SESSION['arrayError']= $arrayError;
        header("location:".WEB_ROUTE.'?controlleurs=admin&view=create.admin');
    }
}



?>
