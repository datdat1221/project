<?php
if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'home';
  }
} else {
  $controller = 'default';
  $controller = 'customer';
  $action = 'home';

  
}
session_start();
require_once('models/database.php');
require_once('routes.php');

?>