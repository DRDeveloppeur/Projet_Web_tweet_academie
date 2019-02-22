<?php
class CommentModel
{
  private $_db;

  function __construct($db)
  {
    $this->_db = $db;
  }

  public function comment()
  {
    $in = $this->_db->prepare('INSERT INTO comment(id_user, id_tweet, content_comment)
    VALUES(?, ?, ?)');
    $in->execute(array($_SESSION['id'],
    $_POST['id_tweet'],
    $_POST['content_comment']));
    echo "string";
    header('Location: index.php?c=home');
  }
}
