<?php

include 'Model/DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();

include 'Model/FollowModel.php';
$follow = new FollowModel($db, $_POST['follow']);
$myFollowed = $follow->follow();
