<?php
class CategoryDAO {
  static function selectAll() {
    $cates = [];
    $db = Database::getInstance();
    $req = $db->query('SELECT * FROM Category');
    foreach ($req->fetchAll() as $item) {
      $cates[] = new Category($item['ID'], $item['Name']);
    }
    return $cates;
  }
  static function insert($cate) {
    $db = Database::getInstance();
    $req = $db->prepare('INSERT INTO Category(Name) VALUES(:name)');
    $params = array('name'=>$cate->name);
    if ($req->execute($params))
      return true;
    return false;
  }
  static function update($cate) {
    $db = Database::getInstance();
    $req = $db->prepare('UPDATE Category SET Name=:name WHERE ID=:id');
    $params = array('name'=>$cate->name, 'id'=>$cate->id);
    if ($req->execute($params))
      return true;
    return false;
  }
  static function delete($id) {
    $db = Database::getInstance();
    $req = $db->prepare('DELETE FROM Category WHERE ID=:id');
    $params = array('id'=>$id);
    if ($req->execute($params))
      return true;
    return false;
  }
  public function deletecategory() {
    $id = $_POST['txtID'];
    $result = CategoryDAO::delete($id);
    if ($result) {
      MyUtil::showAlertAndRedirect('OK BABY!', '?controller=admin&action=listcategory');
    } else {
      MyUtil::showAlertAndRedirect('SORRY BABY!', '?controller=admin&action=listcategory');
    }
  }
}
?>