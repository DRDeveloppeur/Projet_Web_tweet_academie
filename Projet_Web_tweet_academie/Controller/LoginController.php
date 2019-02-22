<?php
include 'Model/DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();
include 'Model/LoginModel.php';
$pers = new LoginModel($db);
$moi = $pers->login($_POST);
include 'View/LoginView.php';
