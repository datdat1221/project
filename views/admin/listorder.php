<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<body class="admin">
  <?php require_once('views/layouts/admin_menu.php') ?>
  <?php if (isset($orders)) { ?>
  <div class="align-center" style="padding-top:100px;position:absolute;left:35%;font-size:15px">

    <h2 class="text-center2" style="text-align:center">ORDER LIST</h2>
    <table class="datatable3" border="1">
      <tr class="datatable">
        <th>OrderID</th>
        <th>Cust
        Name</th>
        <th>Creation date</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <?php foreach ($orders as $item) { ?>
      <tr class="datatable" onclick="window.location='?controller=admin&action=listorder&id=<?=$item->id?>'">
        <th><?=$item->id?></th>
        <td><?=$item->custid?></td>
        <td><?=date("d/m/Y - H:i:s", ($item->cdate/1000))?></td>
        <td><?=$item->total?></td>
        <td><?=$item->status?></td>
        <td>
          <?php if ($item->status == 'PENDING') { ?>
          <a href="?controller=admin&action=updatestatus&status=APPROVED&id=<?=$item->id?>">APPROVE</a>
          ||
          <a href="?controller=admin&action=updatestatus&status=CANCELED&id=<?=$item->id?>">CANCEL</a>
          <?php } ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
  <?php } ?>
  <?php if (isset($odetails)) { ?>
  <div class="align-center">
    <h2 class="text-center2">ORDER DETAIL</h2>
    <table class="datatable4" border="1">
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