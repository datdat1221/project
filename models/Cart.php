<?php
class Cart {
  public $items;
  function __construct() {
    $this->items = array();
  }
  function addItem($newItem) {
    foreach ($this->items as $item) {
      if ($item->product->id == $newItem->product->id) {
        $item->quantity += $newItem->quantity;
        return;
      }
    }
    array_push($this->items, $newItem);
  }
  function getSize() {
    return count($this->items);
  }
  function getTotal() {
    $total = 0;
    foreach ($this->items as $item) {
      $total += $item->product->price * $item->quantity;
    }
    return $total;
  }
  function getItem($id) {
    foreach ($this->items as $item)
      if ($item->product->id == $id)
        return $item;
    return null;
  }
  function removeItem($item) {
    if (($key = array_search($item, $this->items)) !== false)
      unset($this->items[$key]);
  }
}
?>