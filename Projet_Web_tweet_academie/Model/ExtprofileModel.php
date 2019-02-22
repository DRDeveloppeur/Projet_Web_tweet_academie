<?php

class ExtprofileModel
{
  private $_db;
  private $_user;

  public function __construct($db, $user)
  {
    $this->_db = $db;
    $this->_user = $user;
  }

  public function membre()
  {
    $req = $this->_db->prepare('SELECT * FROM user WHERE username = :user');
    $req->bindValue(':user', $this->_user);
    $req->execute();
    $membre = $req->fetch();
    return $membre;
  }

  public function tweetsNbr($id)
  {
    $req = $this->_db->prepare('SELECT * FROM tweet AS t
      LEFT JOIN retweet AS r ON r.id_tweet = t.id_tweet
      WHERE t.id_user = :id
      OR r.id_user = :id
      AND delete_tweet = 1
      AND delete_retweet = 1');
    $req->bindValue(':id', $id[0], PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  public function followersNbr()
  {
    $req = $this->_db->prepare('SELECT * FROM follow
      LEFT JOIN user AS u ON username = :user
      WHERE id_followed = u.id_user
      AND status_follow = 1');
    $req->bindValue(':user', $this->_user, PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  public function followingNbr()
  {
    $req = $this->_db->prepare('SELECT * FROM follow
      LEFT JOIN user AS u ON username = :user
      WHERE id_follower = u.id_user
      AND status_follow = 1');
    $req->bindValue(':user', $this->_user, PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  public function followers($id)
  {
    $req = $this->_db->prepare('SELECT * FROM user as u
      LEFT join follow as f on f.id_follower = u.id_user
      WHERE id_followed = :id
      AND status = 1');
    $req->bindValue(':id', $id[0], PDO::PARAM_INT);
    $req->execute();
    return $req;
  }

  public function following($id)
  {
    $req = $this->_db->prepare('SELECT * FROM user as u
      LEFT join follow as f on f.id_followed = u.id_user
      WHERE id_follower = :id
      AND status = 1');
    $req->bindValue(':id', $id[0], PDO::PARAM_INT);
    $req->execute();
    return $req;
  }
}
