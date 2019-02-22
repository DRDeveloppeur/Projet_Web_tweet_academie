<?php

include 'Model/DatabaseModel.php';
include 'View/RegisterView.php';
include 'Model/RegisterModel.php';

$bd = DatabaseModel::getDatabase();


$validator = new Validator($_POST);

if(!empty($_POST))
{
    $errors = array();

    $validator->isAlpha('username', "Votre username n'est pas valide (alphanumérique)");
    if ($validator->isValid()) {
        $validator->isUniq('username', $bd, 'Cet email est déjà utilisé pour un autre compte');
    }

    $validator->isEmail('email', "Votre adresse email n'est pas valide");
    if ($validator->isValid()) {
        $validator->isUniq('email', $bd, 'Cet email est déjà utilisé pour un autre compte');
    }

    $validator->isAlpha('lastname', "Votre nom n'est pas valide (alphanumérique)");

    $validator->isAlpha('firstname', "Votre prénom n'est pas valide (alphanumérique)");

    $validator->isConfirmed('password', "Vous devez entrer un mot de passe valide");

    if ($validator->isValid())
    {
        $validator->register($bd, $_POST['username'], $_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['password']);
    }
}
