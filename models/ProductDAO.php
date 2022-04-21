<?php
class ProductDAO {
  static function selectAll() {
    $prods = [];
    $db = Database::getInstance();
    $req = $db->query('SELECT * FROM Product');
    foreach ($req->fetchAll() as $item) {
      $prods[] = new Product($item['ID'], $item['Name'], $item['Price'], $item['Image'], $item['CDate'], $item['CatID']);
    }
    return $prods;
  }
  static function insert($prod) {
    $db = Database::getInstance();
    $req = $db->prepare('INSERT INTO Product(Name,Price,Image,CDate,CatID) VALUES(:name,:price,:image,:cdate,:cateid)');
    $params = array('name'=>$prod->name, 'price'=>$prod->price, 'image'=>$prod->image, 'cdate'=>$prod->cdate, 'cateid'=>$prod->cateid);
    if ($req->execute($params))
      return true;
    return false;
  }
  static function selectByID($id) {
    $db = Database::getInstance();
    $req = $db->prepare('SELECT * FROM Product WHERE ID=:id');
    $params = array('id'=>$id);
    $req->execute($params);
    $item = $req->fetch();
    if (isset($item['ID'])) {
      return new Product($item['ID'], $item['Name'], $item['Price'], $item['Image'], $item['CDate'], $item['CatID']);
    }
    return null;
  }
  static function update($prod) {
    $db = Database::getInstance();
    $req = $db->prepare('UPDATE Product SET Name=:name,Price=:price,Image=:image,CDate=:cdate,CatID=:cateid WHERE ID=:id');
    $params = array('name'=>$prod->name, 'price'=>$prod->price, 'image'=>$prod->image, 'cdate'=>$prod->cdate, 'cateid'=>$prod->cateid, 'id'=>$prod->id);
    if ($req->execute($params))
      return true;
    return false;
  }
  static function delete($id) {
    $db = Database::getInstance();
    $req = $db->prepare('DELETE FROM Product WHERE ID=:id');
    $params = array('id'=>$id);
    if ($req->execute($params))
      return true;
    return false;
  }
  static function selectTopNew($top) {
    $prods = [];
    $db = Database::getInstance();
    $req = $db->query('SELECT * FROM Product ORDER BY CDate DESC LIMIT ' . $top);
    foreach ($req->fetchAll() as $item) {
      $prods[] = new Product($item['ID'], $item['Name'], $item['Price'], $item['Image'], $item['CDate'], $item['CatID']);
    }
    return $prods;
  }
  static function selectTopHot($top) {
    $prods = [];
    $db = Database::getInstance();
    $req = $db->query("SELECT ProdID, SUM(Quantity) FROM OrderDetail AS od, COrder AS o WHERE od.OrderID=o.ID AND o.Status='APPROVED' GROUP BY ProdID ORDER BY SUM(Quantity) DESC LIMIT " . $top);
    foreach ($req->fetchAll() as $item) {
      $prods[] = ProductDAO::selectByID($item['ProdID']);
    }
    return $prods;
  }
  static function selectByCateID($cateid) {
    $prods = [];
    $db = Database::getInstance();
    $req = $db->prepare('SELECT * FROM Product WHERE CatID=:cateid');
    $params = array('cateid'=>$cateid);
    $req->execute($params);
    foreach ($req->fetchAll() as $item) {
      $prods[] = new Product($item['ID'], $item['Name'], $item['Price'], $item['Image'], $item['CDate'], $item['CatID']);
    }
    return $prods;
  }
  static function selectByKeyword($keyword) {
    $prods = [];
    $db = Database::getInstance();
    $req = $db->prepare('SELECT * FROM Product WHERE Name LIKE :name');
    $params = array('name'=>('%' . $keyword . '%'));
    $req->execute($params);
    foreach ($req->fetchAll() as $item) {
      $prods[] = new Product($item['ID'], $item['Name'], $item['Price'], $item['Image'], $item['CDate'], $item['CatID']);
    }
    return $prods;
  }
  
  
}
?>