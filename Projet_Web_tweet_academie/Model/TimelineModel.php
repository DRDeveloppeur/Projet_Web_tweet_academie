<?php

class TimelineModel
{
  private $_db;

  public function __construct($db)
  {
    $this->_db = $db;
  }

  public function tweets()
  {
    $req = $this->_db->prepare('SELECT DISTINCT content_tweet, t.id_user,
      username, firstname, DATE_FORMAT(date_tweet, "%d-%m-%Y %H:%i")
      AS date_tweet,
       avatar, t.id_tweet, NOW() as n FROM tweet AS t
      LEFT JOIN user AS u ON u.id_user = t.id_user
      LEFT JOIN follow AS f ON f.id_follower = :id or f.id_followed = :id
      WHERE (t.id_user = :id
        OR t.id_user = f.id_followed) AND delete_tweet = 1
      ORDER BY date_tweet DESC LIMIT 20');
    $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  public function retweet()
  {
    $req = $this->_db->prepare('SELECT *,
      DATE_FORMAT(date_retweet, "%d-%m-%Y %H:%i")
      AS date_retweet, NOW() AS n FROM retweet AS r
    LEFT JOIN tweet AS t ON t.id_tweet = r.id_tweet
    LEFT JOIN user AS u ON u.id_user = t.id_user
    WHERE t.id_tweet = r.id_tweet
    ORDER BY id_retweet DESC LIMIT 20');
    $req->execute();
    return $req;
  }

  public function tweetsNbr()
  {
    $req = $this->_db->prepare('SELECT * FROM tweet AS t
      LEFT JOIN retweet AS r ON r.id_tweet = t.id_tweet
      WHERE t.id_user = :id
      OR r.id_user = :id
      AND delete_tweet = 1
      AND delete_retweet = 1');
    $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  public function commentrt()
  {
    $req = $this->_db->prepare('SELECT * FROM comment AS c
    LEFT JOIN retweet AS r ON r.id_user = c.id_user
    LEFT JOIN user AS u ON u.id_user = c.id_user
    WHERE r.id_tweet = c.id_tweet ORDER BY date_comment DESC LIMIT 5');
    $req->execute();
    return $req;
  }

  public function comment()
  {
    $req = $this->_db->prepare('SELECT * FROM comment AS c
    LEFT JOIN tweet AS t ON t.id_tweet = c.id_tweet
    LEFT JOIN user AS u ON u.id_user = c.id_user
    WHERE t.id_tweet = c.id_tweet
    ORDER BY date_comment DESC LIMIT 5');
    $req->execute();
    return $req;
  }

  public function complement()
  {
    $req = $this->_db->prepare('SELECT username FROM user WHERE status = 1');
    $req->execute();
    return $req;
  }

  public function followersNbr()
  {
    $req = $this->_db->prepare('SELECT * FROM follow WHERE id_followed = :id
      AND status_follow = 1');
    $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  public function followers($id)
  {
    $req = $this->_db->prepare('SELECT * FROM user WHERE id_user = :id
      AND status = 1');
    $req->bindValue(':id', $id[1], PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  public function followingNbr()
  {
    $req = $this->_db->prepare('SELECT * FROM follow WHERE id_follower = :id
      AND status_follow = 1');
    $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  public function following($id)
  {
    $req = $this->_db->prepare('SELECT * FROM user WHERE id_user = :id
      AND status = 1');
    $req->bindValue(':id', $id[0], PDO::PARAM_INT);
    $req->execute();
    return $req;
  }
}
