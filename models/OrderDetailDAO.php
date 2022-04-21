<?php
class OrderDetailDAO {
  static function insert($odetail) {
    $db = Database::getInstance();
    $req = $db->prepare('INSERT INTO OrderDetail(OrderID,ProdID,Quantity) VALUES(:orderid,:prodid,:quantity)');
    $params = array('orderid'=>$odetail->orderid, 'prodid'=>$odetail->prodid, 'quantity'=>$odetail->quantity);
    if ($req->execute($params))
      return true;
    return false;
  }
  static function selectByOrderID($orderid) {
    $odetails = [];
    $db = Database::getInstance();
    $req = $db->prepare('SELECT OrderDetail.OrderID, OrderDetail.ProdID,OrderDetail.Quantity, Product.Name FROM OrderDetail, Product WHERE Product.ID = OrderDetail.ProdID and OrderID=:orderid');
    $params = array('orderid'=>$orderid);
    $req->execute($params);
    foreach ($req->fetchAll() as $item) {
      $odetails[] = new OrderDetail($item['OrderID'], $item['Name'], $item['Quantity']);
    }
    return $odetails;
  }
}
?>
