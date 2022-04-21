<?php
class COrderDAO {
  static function insert($order) {
    $db = Database::getInstance();
    $req = $db->prepare('INSERT INTO COrder(CDate,Total,Status,CustID) VALUES(:cdate,:total,:status,:custid)');
    $params = array('cdate'=>$order->cdate, 'total'=>$order->total, 'status'=>$order->status, 'custid'=>$order->custid);
    if ($req->execute($params))
      return $db->lastInsertId();
    return 0;
  }
  static function selectByCustID($custid) {
    $orders = [];
    $db = Database::getInstance();
    $req = $db->prepare('SELECT * FROM COrder WHERE CustID=:custid');
    $params = array('custid'=>$custid);
    $req->execute($params);
    foreach ($req->fetchAll() as $item) {
      $orders[] = new COrder($item['ID'], $item['CDate'], $item['Total'], $item['Status'], $item['CustID']);
    }
    return $orders;
  }
  static function selectAll() {
    $orders = [];
    $db = Database::getInstance();
    $req = $db->query('SELECT * FROM COrder');
    foreach ($req->fetchAll() as $item) {
      $orders[] = new COrder($item['ID'], $item['CDate'], $item['Total'], $item['Status'], $item['CustID']);
    }
    return $orders;
  }
  static function update($id, $status) {
    $db = Database::getInstance();
    $req = $db->prepare('UPDATE COrder SET Status=:status WHERE ID=:id');
    $params = array('status'=>$status, 'id'=>$id);
    if ($req->execute($params))
      return true;
    return false;
  }
}
?>