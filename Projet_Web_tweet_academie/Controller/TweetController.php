<?php

include 'Model/DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();

include 'Model/TweetModel.php';
$tweet = new TweetModel($db, $_POST);
$monTweet = $tweet->tweet();
