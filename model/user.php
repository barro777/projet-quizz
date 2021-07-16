<?php
function find_login_password(string $login, string $password): array{
    $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
    $arrayUser = json_decode($json, true);
    foreach ($arrayUser as $user) {
        if($user['login']== $login && $user['password']== $password){
            return $user;
    }
    
}
            return [];

}function add_user(array $user){
   $json = file_get_contents(ROUTE_DIR.'data/user.data.json');
   $arrayUser = json_decode($json, true);
   $arrayUser[] = $user;
   $json= json_encode($arrayUser);
   file_put_contents(ROUTE_DIR.'data/user.data.json' , $json);
   
}
function cree_quest(array $quest){
    $json = file_get_contents(ROUTE_DIR.'data/cree.question.json');
    $arrayqest = json_decode($json,true);
    $arrayqest[]=$quest;
    $json = json_encode($arrayqest);
    file_put_contents(ROUTE_DIR.'data/cree.question.json',$json);
}

/*function modif (array $user){
    $arrayUser = add_user($user);
    foreach ($arrayUser as $key => $olduser) {
        if ($olduser['code'] == $newuser ['code']) {
            $arrayUser[$key] = $newuser;
        }
    }

    
    }
    function find_us(string $nom ,string $prenom){
    $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
    $arrayUser = json_decode($json, true);
    foreach ($arrayUser as $name){
        if ($name['nom'] == $nom && $name['prenom'] == $prenom ){
            return $name;
        }
    }
    return [];
}*/



require_once(ROUTE_DIR.'lib/validator.php');
require_once(ROUTE_DIR.'lib/session.php');
require_once(ROUTE_DIR.'model/user.php');

?>