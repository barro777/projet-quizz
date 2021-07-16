<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['view'])) {
        if ($_GET['view']== 'connexion') {
            require(ROUTE_DIR.'view/security/connexion.html.php');
        }elseif ($_GET['view']== 'inscription') {
            require(ROUTE_DIR.'view/security/inscription.html.php');
        }elseif ($_GET['view']== 'deconnexion') {
            deconnexion();
            require(ROUTE_DIR.'view/security/connexion.html.php');
        }
    }else {
        require(ROUTE_DIR.'view/security/connexion.html.php');
    }
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'connexion') {
            connexion($_POST['login'],$_POST['password']);
    }elseif ($_POST['action'] == 'inscription') {
        unset($_POST['controlleurs']);
        unset($_POST['connexion']);
        unset($_POST['inscription']);
        unset($_POST['action']);
       inscription($_POST);
    }
}
}

function connexion(string $login , string $password): void {
    $arrayError = [];
    validation_login($login, 'login', $arrayError);
    validation_password($password, 'password', $arrayError);
    if (form_valid($arrayError)) {
        $user = find_login_password($login, $password);
        if (count($user) == 0) {
            $arrayError['arrayConnexion'] = 'login or password is incorrect';
            $_SESSION['arrayError'] = $arrayError;
            header("location:".WEB_ROUTE.'?controlleurs=security&view=connexion');

        }else{

            $_SESSION['userConnect'] = $user;
            
            if ($user['role']=='ROLE_ADMIN'){
                header("location:".WEB_ROUTE.'?controlleurs=admin&view=liste.question');
            }elseif ($user['role']=='ROLE_JOUEUR'){
                header("location:".WEB_ROUTE.'?controlleurs=joueur&view=jeu');
            }
        }
    }else{
        $_SESSION['arrayError']= $arrayError;
        header("location:".WEB_ROUTE.'?controlleurs=security&view=connexion');
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
        header("location:".WEB_ROUTE.'?controlleurs=security&view=inscription');
    }
    if (form_valid($arrayError)) {
        $user= find_login_password($login, $password);
        if (est_admin()) {
            $data['role'] = 'ROLE_ADMIN';
           }else {
                $data['role'] = 'ROLE_JOUEUR';
           }
        add_user($data);
        header("location:".WEB_ROUTE.'?controlleurs=security&view=connexion');

        if (count($user) == 0) {
            $arrayError['arrayConnexion'] = 'login or password is incorrect';
            $_SESSION['arrayError'] = $arrayError;
            header("location:".WEB_ROUTE.'?controlleurs=security&view=inscription');

        }else{
            $_SESSION['userConnect']= $user;
            if ($user['role']=='ROLE_ADMIN'){
                header("location:".WEB_ROUTE.'?controlleurs=admin&view=liste.question');
            }elseif ($user['role']=='ROLE_JOUEUR'){
                header("location:".WEB_ROUTE.'?controlleurs=joueur&view=jeu');
            }
        }
    }else{
        $_SESSION['arrayError']= $arrayError;
        header("location:".WEB_ROUTE.'?controlleurs=security&view=inscription');
    }
    
}

function deconnexion(): void {
    unset($_SESSION['userConnect']);
}
?>