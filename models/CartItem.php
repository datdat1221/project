<?php
class CartItem {
  public $product;
  public $quantity;
  function __construct($product, $quantity) {
    $this->product = $product;
    $this->quantity = $quantity;
  }
}
?>