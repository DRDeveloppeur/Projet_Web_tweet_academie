
<?php

class MembersModel
{
  private $_db;

  public function __construct($db)
  {
    $this->_db = $db;
  }

  public function login()
  {
    $req = $this->_db->prepare('SELECT *, DATE_FORMAT(register_date, "%d/%m/%Y")
     AS register_date FROM user
       WHERE id_user <> :id AND status = 1 AND :id
       NOT IN (SELECT id_follower FROM follow WHERE id_followed = id_user)
       LIMIT 5');
      $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
      $req->execute();
      return $req;
  }
}
