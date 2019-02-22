<?php

include 'Model/DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();


include 'Model/TimelineModel.php';
$job = new TimelineModel($db);
$tline = $job->tweets();
$cnt = $job->tweetsNbr();
$cntweet = count($cnt->fetchAll());
$cnt1 = $job->followersNbr();
$cnfollowers = count($cnt1->fetchAll());
$cnt2 = $job->followingNbr();
$cnfollowing = count($cnt2->fetchAll());


include 'View/ProfileView.php';
