<?php
class AdminDAO {
  static function selectByUsername($username) {
    $db = Database::getInstance();
    $req = $db->prepare('SELECT * FROM Admin WHERE Username=:username');
    $params = array('username'=>$username);
    $req->execute($params);
    $item = $req->fetch();
    if (isset($item['Username']))
      return new Admin($item['Username'], $item['Password']);
    return null;
  }
}
?>