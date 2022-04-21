<?php
class Customer {
  public $id;
  public $username;
  public $password;
  public $name;
  public $phone;
  public $email;
  public $active;
  public $token;
  function __construct($id, $username, $password, $name, $phone, $email, $active, $token) {
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->name = $name;
    $this->phone = $phone;
    $this->email = $email;
    $this->active = $active;
    $this->token = $token;
  }
}
?>