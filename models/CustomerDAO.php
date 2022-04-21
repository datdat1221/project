<?php
class CustomerDAO {
  static function selectByUsernameOrEmail($username, $email) {
    $db = Database::getInstance();
    $req = $db->prepare('SELECT * FROM Customer WHERE Username=:username OR Email=:email');
    $params = array('username'=>$username, 'email'=>$email);
    $req->execute($params);
    $item = $req->fetch();
    if (isset($item['ID']))
      return new Customer($item['ID'], $item['Username'], $item['Password'], $item['Name'], $item['Phone'], $item['Email'], $item['Active'], $item['Token']);
    return null;
  }
  static function insert($cust) {
    $db = Database::getInstance();
    $req = $db->prepare('INSERT INTO Customer(Username,Password,Name,Phone,Email,Active,Token) VALUES(:username,:password,:name,:phone,:email,:active,:token)');
    $params = array('username'=>$cust->username, 'password'=>$cust->password, 'name'=>$cust->name, 'phone'=>$cust->phone, 'email'=>$cust->email, 'active'=>$cust->active, 'token'=>$cust->token);
    if ($req->execute($params))
      return $db->lastInsertId();
    return 0;
  }
  static function active($id, $token, $active) {
    $db = Database::getInstance();
    $req = $db->prepare('UPDATE Customer SET Active=:active WHERE ID=:id AND Token=:token');
    $params = array('active'=>$active, 'id'=>$id, 'token'=>$token);
    if ($req->execute($params)) {
      return true;
    }
    return false;
  }
  static function selectByUsernameAndPassword($username, $password) {
    $db = Database::getInstance();
    $req = $db->prepare('SELECT * FROM Customer WHERE Username=:username AND Password=:password');
    $params = array('username'=>$username, 'password'=>$password);
    $req->execute($params);
    $item = $req->fetch();
    if (isset($item['ID'])) {
      return new Customer($item['ID'], $item['Username'], $item['Password'], $item['Name'], $item['Phone'], $item['Email'], $item['Active'], $item['Token']);
    }
    return null;
  }
  static function update($cust) {
    $db = Database::getInstance();
    $req = $db->prepare('UPDATE Customer SET Username=:username,Password=:password,Name=:name,Phone=:phone,Email=:email,Active=:active,Token=:token WHERE ID=:id');
    $params = array('username'=>$cust->username, 'password'=>$cust->password, 'name'=>$cust->name, 'phone'=>$cust->phone, 'email'=>$cust->email, 'active'=>$cust->active, 'token'=>$cust->token, 'id'=>$cust->id);
    if ($req->execute($params)) {
      return true;
    }
    return false;
  }
  static function selectAll() {
    $custs = [];
    $db = Database::getInstance();
    $req = $db->query('SELECT * FROM Customer');
    foreach ($req->fetchAll() as $item) {
      $custs[] = new Customer($item['ID'], $item['Username'], $item['Password'], $item['Name'], $item['Phone'], $item['Email'], $item['Active'], $item['Token']);
    }
    return $custs;
  }
  static function selectByID($id) {
    $db = Database::getInstance();
    $req = $db->prepare('SELECT * FROM Customer WHERE ID=:id');
    $params = array('id'=>$id);
    $req->execute($params);
    $item = $req->fetch();
    if (isset($item['ID'])) {
      return new Customer($item['ID'], $item['Username'], $item['Password'], $item['Name'], $item['Phone'], $item['Email'], $item['Active'], $item['Token']);
    }
    return null;
  }
}
?>