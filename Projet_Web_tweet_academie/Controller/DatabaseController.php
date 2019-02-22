<?php echo "Database";

include 'Model/DatabaseModel.php';
include 'View/DataView.php';
$bdd = new DatabaseModel;
$bd = $bdd->data();
  var_dump($bd);
