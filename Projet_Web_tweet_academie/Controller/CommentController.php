<?php

include 'Model/DatabaseModel.php';
$dbs = new Databasev2Model;
$db = $dbs->base();
if (!empty($_POST['content_comment'])) {
  include 'Model/CommentModel.php';
  $comment = new CommentModel($db);
  $comm = $comment->comment();
}else {
  header('Location: index.php?c=home');
}
