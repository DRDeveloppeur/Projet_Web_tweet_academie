<?php

class TweetModel
{
  private $_db;
  private $_tweet;

  public function __construct($db, $tweet)
  {
    $this->_db = $db;
    $this->_tweet = $tweet;
  }

  public function tweet()
  {
    $req = $this->_db->prepare('INSERT INTO tweet(id_user, content_tweet) VALUES(?, ?)');
    $this->verif();
      $req->execute(array(htmlspecialchars($_SESSION['id']),
      htmlspecialchars($this->_tweet['tweet'])));
    header ('Location: index.php?c=home');
  }

  public function verif()
  {
    if (empty($this->_tweet['tweet'])) {
      header ('Location: index.php?c=home');
      die;
    }
  }
}
