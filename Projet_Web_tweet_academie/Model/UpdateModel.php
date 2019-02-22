<?php

class UpdateModel
{
private $_db;

  function __construct($db)
  {
    $this->_db = $db;
  }

  public function membres()
  {
    $req = $this->_db->prepare('SELECT * FROM user');
    $req->execute();
    return $req;
  }

  public function update(array $perso)
  {
    foreach ($perso as $key => $value) {
      if ($key != 'curent_password' && !empty($perso[$key])) {
        $q = $this->_db->prepare("UPDATE user
        SET $key = :test
        WHERE id_user = :id");
        if (!empty($perso[$key])) {
          if ($key == "password") {
            $salt = "si tu aimes la wac tape dans tes mains";
            $password = hash('ripemd160', $salt . htmlspecialchars($value));
            $q->bindValue(':test', $password);
            $q->bindValue(':id', $_SESSION['id']);
            $this->verif($perso, $key, $value);
            $_SESSION['password'] = $password;
          }
          else {
            $q->bindValue(':test', htmlspecialchars($perso[$key]));
            $q->bindValue(':id', $_SESSION['id']);
            $this->verif($perso, $key, $value);
            $_SESSION[$key] = $perso[$key];
          }
        }
      }
    }
    $q->execute();
  }

  public function verif($perso ,$key, $value)
  {
    var_dump($perso);
    if (!empty($perso['password'])) {
      $salt = "si tu aimes la wac tape dans tes mains";
      $pass = hash('ripemd160', $salt . htmlspecialchars($perso['curent_password']));
    }
    if ($_SESSION['password'] != $pass && !empty($pass)) {
      echo "Erreur MDP";
      die;
    }
    $mem = $this->membres();
    while ($membres = $mem->fetch()) {
      if ($key == "email") {
        if ($membres['email'] == $value) {
          echo "Erreur email";
          die;
        }
      }
      if ($key == "username") {
        if ($membres['username'] == $value) {
          echo "Erreur username";
          die;
        }
      }
    }
  }

  public function delete($id)
  {
    $bdd = new PDO ('mysql:host=localhost;dbname=my_meetic;charser=utf8',
    'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $q = $bdd->prepare('UPDATE membre
      SET activ = FALSE
      WHERE id_membre = :id');
      $q->bindValue(':id', $id);
      $q->execute();
  }
}
