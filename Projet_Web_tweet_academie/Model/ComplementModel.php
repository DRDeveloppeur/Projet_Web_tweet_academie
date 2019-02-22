<?php

include 'DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();

class ComplementModel
{
  private $_db;

  public function __construct($db)
  {
    $this->_db = $db;
  }

  public function complement()
  {
    $req = $this->_db->prepare('SELECT * FROM user WHERE status = 1');
    $req->execute();
    while ($users = $req->fetch()) {
    echo "@".$users['username'].",";
    }
  }
}
$complement = new ComplementModel($db);
$complements = $complement->complement();
