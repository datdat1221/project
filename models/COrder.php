<?php
class COrder {
  public $id;
  public $cdate;
  public $total;
  public $status;
  public $custid;
  function __construct($id, $cdate, $total, $status, $custid) {
    $this->id = $id;
    $this->cdate = $cdate;
    $this->total = $total;
    $this->status = $status;
    $this->custid = $custid;
  }
}
?>