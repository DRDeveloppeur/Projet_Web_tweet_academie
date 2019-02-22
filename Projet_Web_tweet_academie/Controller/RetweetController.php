<?php

include 'Model/DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();

include 'Model/RetweetModel.php';
$dbs = new RetweetModel($db);
$db = $dbs->retweet();
