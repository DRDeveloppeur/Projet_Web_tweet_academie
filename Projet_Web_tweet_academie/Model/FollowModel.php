<?php

class FollowModel
{
  private $_db;
  private $_follow;

  public function __construct($db, $follow)
  {
    $this->_db = $db;
    $this->_follow = $follow;
  }

  public function follow()
  {
    $req = $this->_db->prepare('INSERT INTO follow(id_followed, id_follower)
    VALUES(?, ?)');
      $req->execute(array(htmlspecialchars($this->_follow),
      htmlspecialchars($_SESSION['id'])));

    header ('Location: index.php?c=home');
  }
}
