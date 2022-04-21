
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<body class="admin">
<?php require_once('views/layouts/admin_menu.php') ?>
  <?php if (isset($custs)) { ?>
    <div class="align-center" style="padding-top:100px;position:absolute;left:30%;font-size:15px">
    <h2 class="text-center" style="text-align:center">CUSTOMER LIST</h2>
    <table class="datatable5" border="0">
      <tr class="datatable">
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Active</th>
        <th>Action</th>
      </tr>
      <?php foreach ($custs as $item) { ?>
      <tr class="datatable" onclick="window.location='?controller=admin&action=listcustomer&cid=<?=$item->id?>'">
        <th><?=$item->id?></th>
        <td><?=$item->username?></td>
        <td><?=$item->password?></td>
        <td><?=$item->name?></td>
        <td><?=$item->phone?></td>
        <td><?=$item->email?></td>
        <td><?=$item->active?></td>
        <td>
          <?php if ($item->active == 0) { ?>
          <a href="?controller=admin&action=sendmail&id=<?=$item->id?>">EMAIL</a>
          <?php } else if ($item->active == 1) { ?>
          <a href="?controller=admin&action=deactive&id=<?=$item->id?>&token=<?=$item->token?>" onclick="return confirm('ARE YOU SURE?')">DEACTIVE</a>
          <?php } ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
  <?php } ?>
  <?php if (isset($orders)) { ?>
  <div class="align-center">
    <h2 class="text-center">ORDER LIST</h2>
    <table class="datatable5" border="1">
      <tr class="datatable">
        <th>OrderID</th>
        <th>CustID</th>
        <th>Creation date</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
      <?php foreach ($orders as $item) { ?>
      <tr class="datatable" onclick="window.location='?controller=admin&action=listcustomer&cid=<?=$item->custid?>&oid=<?=$item->id?>'">
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
  <div class="align-center">
    <h2 class="text-center">ORDER DETAIL</h2>
    <table class="datatable5" border="1">
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