<?php
require_once('controllers/base_controller.php');
class DefaultController extends BaseController {
  function __construct() {
    $this->folder = 'default';
  }
  public function home() {
    $data = array('name'=>'', 'email'=>'');
    $this->render('home', $data);
  }
  public function error() {
    $this->render('error');
  }
}
?>