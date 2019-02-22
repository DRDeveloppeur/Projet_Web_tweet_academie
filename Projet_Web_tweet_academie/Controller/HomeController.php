<?php

include 'Model/DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();

include 'Model/MembersModel.php';
$pers = new MembersModel($db, $_SESSION);
$moi = $pers->login();

include 'Model/TimelineModel.php';
$job = new TimelineModel($db);
$tline = $job->tweets();
$rt = $job->retweet();
$cnt = $job->tweetsNbr();
$cntweet = count($cnt->fetchAll());
$followers = $job->followersNbr();
$cnfollowers = count($followers->fetchAll());
$following = $job->followingNbr();
$cnfollowing = count($following->fetchAll());
$comsrt = $job->commentrt();
$comrt = $comsrt->fetchAll();
$coms = $job->comment();
$com = $coms->fetchAll();

class Time
{
  private $_twitt;
  private $_mnt;

  function __construct($twitt)
  {
    $this->_twitt = $twitt['date_tweet'];
    $this->_mnt = $twitt['n'];
  }

  public function time()
  {
    $d1 = new DateTime($this->_mnt);
    $d2 = new DateTime($this->_twitt);

    $diff = $d1->diff($d2);
    $diffa = $d1->diff($d2);
    $diffm = $d1->diff($d2);
    $diffh = $d1->diff($d2);
    $diffi= $d1->diff($d2);
    $diffs= $d1->diff($d2);
    if ($nb_an = $diffa->y > 0) {
      echo $nb_an = $diffa->y."Ans ";
    }
    if ($nb_mois = $diffm->m > 0) {
      echo $nb_mois = $diffm->m."Mois ";
    }
    if ($nb_jours = $diff->d > 0) {
      echo $nb_jours = $diff->d."J ";
    }
    if ($nb_heur = $diffh->h > 0) {
      echo $nb_heur = $diffh->h ."h ";
    }
    if ($nb_min = $diffi->i > 0) {
      echo $nb_min = $diffi->i ."m ";
    }
    if ($nb_sec = $diffi->s > 0 && empty($nb_min)) {
      echo $nb_sec = $diffi->s ."s ";
    }
  }
}
class ReTime
{
  private $_twitt;
  private $_mnt;

  function __construct($twitt)
  {
    $this->_twitt = $twitt['date_retweet'];
    $this->_mnt = $twitt['n'];
  }

  public function time()
  {
    $d1 = new DateTime($this->_mnt);
    $d2 = new DateTime($this->_twitt);

    $diff = $d1->diff($d2);
    $diffa = $d1->diff($d2);
    $diffm = $d1->diff($d2);
    $diffh = $d1->diff($d2);
    $diffi= $d1->diff($d2);
    $diffs= $d1->diff($d2);
    if ($nb_an = $diffa->y > 0) {
      echo $nb_an = $diffa->y."Ans ";
    }
    if ($nb_mois = $diffm->m > 0) {
      echo $nb_mois = $diffm->m."Mois ";
    }
    if ($nb_jours = $diff->d > 0) {
      echo $nb_jours = $diff->d."J ";
    }
    if ($nb_heur = $diffh->h > 0) {
      echo $nb_heur = $diffh->h ."h ";
    }
    if ($nb_min = $diffi->i > 0) {
      echo $nb_min = $diffi->i ."m ";
    }
    if ($nb_sec = $diffi->s > 0 && empty($nb_min)) {
      echo $nb_sec = $diffi->s ."s ";
    }
  }
}


include 'View/homeView.php';
