<link rel="stylesheet" href="assets/css/details.css">
<body class="customer">
  <?php require_once('views/layouts/customer_menu.php') ?>
  <?php require_once('views/layouts/customer_inform.php') ?>
  <div class="align-center">
    <h2 class="text-center">PRODUCT DETAILS</h2>
    <figure class="caption-right">
      <img src="data:image/jpg;base64,<?=$prod->image?>" />
      <figcaption>
        <form class="table" action="?controller=customer&action=add2cart" method="POST">
          <table >
            <tr>
              <td align="right">ID:</td>
              <td><?=$prod->id?></td>
            <tr>
            <tr>
              <td align="right">Name:</td>
              <td><?=$prod->name?></td>
            <tr>
            <tr>
              <td align="right">Price:</td>
              <td>$<?=$prod->price?></td>
            <tr>
            <tr>
              <td align="right">CatID:</td>
              <td><?=$prod->cateid?></td>
            <tr>
            <tr>
              <td align="right">Quantity:</td>
              <td><input type="number" name="txtQuantity" value="1" min="1" max="99" required /></td>
            <tr>
            <tr>
              <td><input type="hidden" name="txtID" value="<?=$prod->id?>" /></td>
              <td><input type="submit" value="ADD TO CART" /></td>
            </tr>
          </table>
        </form>
      </figcaption>
    </figure>
  </div>
</body>