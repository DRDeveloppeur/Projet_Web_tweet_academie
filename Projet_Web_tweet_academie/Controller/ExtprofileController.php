<?php

include 'Model/DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();

include 'Model/ExtprofileModel.php';
$job = new ExtprofileModel($db, $_GET['p']);
$membre = $job->membre();
$cnt = $job->tweetsNbr($membre);
$cntweet = count($cnt->fetchAll());
$cnt1 = $job->followersNbr();
$cnfollowers = count($cnt1->fetchAll());
$cnt2 = $job->followingNbr();
$cnfollowing = count($cnt2->fetchAll());
$followers = $job->followers($membre);
$following = $job->following($membre);

include 'View/ExtprofileView.php';
