<?php
// List controllers and actions
$controllers = array(
  'default' => ['home', 'error'],
  'customer' => ['home', 'listproduct','search', 'details', 'signup', 'verify', 'login', 'logout', 'myprofile', 'add2cart', 'mycart', 'remove2cart', 'checkout', 'myorders', 'updatestatus'],
  'admin' => ['home', 'login', 'logout', 'listcategory', 'addcategory' ,'updatecategory', 'deletecategory', 'listproduct', 'addproduct', 'updateproduct', 'deleteproduct', 'listcustomer', 'deactive', 'sendmail', 'listorder','updatestatus']
);
// if the parameters of URL are invalid then show error page
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'default';
  $action = 'error';
}
// load the file xxx_controller.php corresponding to the $controller parameter
include_once('controllers/' . $controller . '_controller.php');
// create object from xxxController class
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
// call the action corresponding to the $action parameter
$controller->$action();
?>
s