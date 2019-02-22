<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_GET['c']) && is_file('Controller/'.ucfirst($_GET['c']).'Controller.php'))
{
  if (!empty($_SESSION['co']) OR $_GET['c'] == "register") {
    $controller = ucfirst($_GET['c']).'Controller';
    include 'Controller/'.$controller.'.php';
    $act = ucfirst($_GET['c']).'Controller';
    if (class_exists($act)) {
      $action = new $act;

      if (isset($_GET['a']) && method_exists($action, $_GET['a']))
      {
        $meth = $_GET['a'];
        $action->$meth();
      }
    }
  }
  else
  {
    include 'Controller/LoginController.php';
  }
}
else
{
  include 'Controller/LoginController.php';
}
