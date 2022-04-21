<body >
  <?php require_once('views/layouts/customer_menu.php') ?>
  <?php require_once('views/layouts/customer_inform.php') ?>
  
  <?php if (isset($orders)) { ?>
  <div class="align-center" style="padding-top:150px ">
    <h2 class="text-center" style="text-align:center;font-size:20px">ORDER LIST</h2>
    <table class="datatable1" style="font-size:15px;position:relative;left:37%; border:1px solid #000">
      <tr class="datatable" style=" border:1px solid #000">
        <th style="">OrderID</th>
        <th>CustName</th>
        <th>Creation date</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
      <?php foreach ($orders as $item) { ?>
      <tr class="datatable" onclick="window.location='?controller=customer&action=myorders&id=<?=$item->id?>'">
        <th><?=$item->id?></th>
        <td><?=$item->custid?></td>
        <td><?=date("d/m/Y - H:i:s", ($item->cdate/1000))?></td>
        <td><?=$item->total?></td>
        <td><?=$item->status?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
  <?php } ?>
  <?php if (isset($odetails)) { ?>
  <div class="align-center"  style="padding-top:20px ">
    <h2 class="text-center" style="text-align:center;font-size:20px">ORDER DETAIL</h2>
    <table class="datatable2"style="font-size:15px;position:relative;left:43%; border:1px solid #000">
      <tr class="datatable">
        <th>OrderID</th>
        <th>ProdName</th>
        <th>Quantity</th>
      </tr>
      <?php foreach ($odetails as $item) { ?>
      <tr class="datatable">
        <td><?=$item->orderid?></td>
        <td><?=$item->prodid?></td>
        <td><?=$item->quantity?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
  <?php } ?>
  
  
  
</body>