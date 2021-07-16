<?php
// function de validation
function est_vide($val): bool {
    return empty($val);
}
function controlle_chaine(string $chaine , string $norm){
    $norm = 'abcdefghijklmnopqrstuvwxyz ?';
    if (est_chaine($chaine)==$norm) {
        return true;
    }
    return false;
}
function valid_question(string $chaine ,string $key): array{
    $arrayError = array();
    if(controlle_chaine($chaine,false)&& substr($chaine,-1)!="?"){
        return $arrayError[$key]="veiller revoir votre question";

    }
    return $arrayError[$key];
}

 

function form_valid($array): bool{
    return count($array) == 0;
}

function est_entier($val): bool {
    return is_numeric($val);
}
function valid_num($num): array{
    $arrayError[] = array();
    if (est_entier($num) >= 1){
        return $arrayError;
    }
return $arrayError[] = "saisi non valid";
}
function choix(string $choix){
    if (est_chaine($choix)== "multiple"){
        
    }elseif (est_chaine($choix)=="unique") {
            
    }elseif (est_chaine($choix)== "saisi")  {
        
    }
    return $choix;
}
function valid_choix( string $choice) : array{
    $arrayError = array();
    if (choix($choice) == $choice){
         return $arrayError;
    }else {
        return $arrayError []= "choix invalid";
    }
    return $arrayError;
}

function validation($val, string $key) {
    $arrayError=array();
    if (empty($val)) {
      $arrayError[$key]="Ce champ est obligatoire";
    }else {
       
}
function valid_name($valeur,string $key):array{
    $arrayError=array();
    if(est_entier($valeur)== false){
        $arrayError[$key]='le name n\'est pas valide';
    }elseif($key>=15){
        $arrayError[$key]='le name est trop long';
    }
    return $arrayError;
}



function verif_taille(string $valeur): bool{
    return $valeur <= 19;
}
function verif_taille1(string $valeur): bool{
    return $valeur <= 25;
}
function est_chaine(string $chaine): bool{
    return $chaine;
}
function est_phrase(string $chaine): bool{
    return $chaine;
}
function valide_phrase(string $text): bool{
    return $text;
}
function est_videe(string $chaine): bool{
    return empty($chaine);
}
function verif_taile(string $chaine): bool {
    return $chaine;
}
function est_valide(string $separator): bool{
    return empty($separator);
}
}
function est_mail(string $val): bool{
    if (filter_var($val , FILTER_VALIDATE_EMAIL)) {
       return true;
    } else {
        return false;
    }
    
}

function validation_login($val , string $key,array &$arrayError){
    if (est_vide($val)) {
        $arrayError[$key]="Le login est obligatoire";
    } elseif (!est_mail($val)) {
        $arrayError[$key]="Le login doit etre un mail ";
    }
    
}
function validation_naisse(string $val, string $key, array &$arrayError){
    if (est_vide($val)){
        $arrayError[$key]="Le champ est obligatoire";
    }elseif (!est_entier($val)) {
        $arrayError[$key]="La saisie doit etre numérique";
    }
}
function validation_password($val , string $key,array &$arrayError, int $min=6, int $max=10){
    if (est_vide($val)) {
        $arrayError[$key]="Le password est obligatoire";
    } elseif (strlen($val) < $min || strlen($val) > $max) {
        $arrayError[$key]="Le password doit etre entre $min et $max";
    }
    
}
function validation_champ($val , string $key,array &$arrayError){
    if (est_vide($val)) {
        $arrayError[$key]="Le champ est obligatoire";
    }
    
}
/**
 * validation
 *
 * @param miexed $valeur
 * @param string $key
 * @return array
 */
function validation_input($valeur, string $key): array
{
    $error = [];
    if (empty($valeur)) {
        $error[$key] = "Champ obligatoire";
    } elseif (!is_numeric($valeur)) {
        $error[$key] = "Saisir une valeur entière";
    } elseif ($valeur <= 0) {
        $error[$key] = "Saisir une valeur positive";
    }
    return $error;
}

function verif_mois($valeur): bool
{
    return $valeur > 0 && $valeur <= 12;
}

function is_annee_bissextile(int $annee): bool
{
    return $annee % 400 == 0 || ($annee % 4 == 0 && $annee % 100 != 0);
}

function verif_date(int $jour, int $mois, int $annee): bool
{
    if (verif_mois($mois)) {
        switch ($mois) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                return $jour > 0 && $jour <= 31;
            case 4:
            case 6:
            case 9:
            case 11:
                return $jour > 0 && $jour <= 30;
            case 2:
                if (is_annee_bissextile($annee)) {
                    return $jour > 0 && $jour <= 29;
                } else {
                    return $jour > 0 && $jour <= 28;
                }
            default:
                return false;
        }
    } else {
        return false;
    }
}

$arrayErrors = [];
$resultat = $rest = $an = "";
if (isset($_POST['inscription'])) {
    $arrayErrors['jour'] = validation_input($_POST['jour'], 'jour');
    $arrayErrors['mois'] = validation_input($_POST['mois'], 'mois');
    $arrayErrors['annee'] = validation_input($_POST['annee'], 'annee');
}
?>