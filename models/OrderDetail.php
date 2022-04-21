<?php
class OrderDetail {
  public $orderid;
  public $prodid;
  public $quantity;
  function __construct($orderid, $prodid, $quantity) {
    $this->orderid = $orderid;
    $this->prodid = $prodid;
    $this->quantity = $quantity;
  }
}
?>