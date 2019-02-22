<?php

class LoginModel
{
  private $_db;
  private $_moi;

  public function __construct($db)
  {
    $this->_db = $db;
  }

  public function login($membre)
  {
    if (!empty($_POST['email']))
    {
      $req = $this->_db->prepare('SELECT *, DATE_FORMAT(register_date, "%d/%m/%Y") AS register_date FROM user WHERE email = :email');
      $req->bindValue(':email', $membre['email']);
      $req->execute();
      $moi = $req->fetch();
      $this->_moi = $moi;
      $this->verif($membre);
      session_start();
      $_SESSION['co'] = 1;
      $_SESSION['id'] = $moi['id_user'];
      $_SESSION['username'] = $moi['username'];
      $_SESSION['email'] = $moi['email'];
      $_SESSION['firstname'] = $moi['firstname'];
      $_SESSION['lastname'] = $moi['lastname'];
      $_SESSION['avatar'] = $moi['avatar'];
      $_SESSION['theme'] = $moi['theme'];
      $_SESSION['password'] = $moi['password'];
      $_SESSION['register_date'] = $moi['register_date'];
      header('Location: index.php?c=home');
    }
    if (!empty($_POST['username']))
    {
      $req = $this->_db->prepare('SELECT *,
        DATE_FORMAT(register_date, "%d/%m/%Y")
        AS register_date FROM user WHERE username = :username');
      $req->bindValue(':username', $membre['username']);
      $req->execute();
      $moi = $req->fetch();
      $this->_moi = $moi;
      $this->verif($membre);
      session_start();
      $_SESSION['co'] = 1;
      $_SESSION['id'] = $moi['id_user'];
      $_SESSION['username'] = $moi['username'];
      $_SESSION['email'] = $moi['email'];
      $_SESSION['firstname'] = $moi['firstname'];
      $_SESSION['lastname'] = $moi['lastname'];
      $_SESSION['avatar'] = $moi['avatar'];
      $_SESSION['theme'] = $moi['theme'];
      $_SESSION['password'] = $moi['password'];
      $_SESSION['register_date'] = $moi['register_date'];
      header('Location: index.php?c=home');
    }
  }

  public function verif($membre)
  {
    $moi = $this->_moi;
    if (!empty($_POST['email'])) {
      if ($moi['email'] != $membre['email']) {
        echo "email erreur";
        die;
      }
    }
    if (!empty($_POST['username'])) {
      if ($moi['username'] != $membre['username']) {
        echo "username erreur";
        die;
      }
    }
    $salt = "si tu aimes la wac tape dans tes mains";
    $password = hash('ripemd160', $salt . $membre['password']);
    if ($password != $moi['password']) {
      echo "mot de passe incorrecrt !";
      die;
    }
    if ($moi['status'] != 1) {
      echo "Compte desactiver";
      die;
    }
  }
}
