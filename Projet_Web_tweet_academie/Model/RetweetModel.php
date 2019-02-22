<?php

class RetweetModel
{
  private $_db;

  function __construct($db)
  {
    $this->_db = $db;
  }

  public function retweet()
  {
    $re = $this->_db->prepare('SELECT * FROM tweet
      WHERE id_tweet = '.$_POST['id'].'');
    $re->execute();
    $tweet = $re->fetch();
    $this->retweeter($tweet);
    return $tweet;
  }

  public function retweeter(array $tweet)
  {
    $in = $this->_db->prepare('INSERT INTO retweet(id_user, id_tweet)
    VALUES(?, ?)');
    $in->execute(array($_SESSION['id'], $tweet['id_tweet']));
    header('Location: index.php?c=home');
  }
}
