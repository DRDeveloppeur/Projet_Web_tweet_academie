<?php

include 'Model/DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();

include 'Model/UpdateModel.php';
$dbs = new UpdateModel($db);
$db = $dbs->update($_POST);

header('Location: index.php?c=profile');
