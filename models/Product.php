<?php
class Product {
  public $id;
  public $name;
  public $price;
  public $image;
  public $cdate;
  public $cateid;
  function __construct($id, $name, $price, $image, $cdate, $cateid) {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
    $this->cdate = $cdate;
    $this->cateid = $cateid;
  }
}
?>