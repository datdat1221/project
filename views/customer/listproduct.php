<link rel="stylesheet" href="assets/css/home.css">
<body class="customer">
  <?php require_once('views/layouts/customer_menu.php') ?>
  <?php require_once('views/layouts/customer_inform.php') ?>
  <section class="products" id="products">

  <?php foreach ($prods as $prod) { ?>
  
    <div class="box-container" style="padding-top:100px">
        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="?controller=customer&action=details&id=<?=$prod->id?>" class="fas fa-eye"></a>
            </div>
            <img src="data:image/jpg;base64,<?=$prod->image?>"/>
            <div class="content">
                <h3><?=$prod->name?></h3>
                <div class="price">$<?=$prod->price?></div>
                
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
               
    
              </div>
          <form action="?controller=customer&action=add2cart" method="POST">
          <table>
          <div class="quanlity" style="display:flex;position:relative; left:110px">
          <h4 style="padding-right:10px">Số lượng: </h4>
              <input type="number" name="txtQuantity" value="1" min="1" max="99" required /></div>
   
          <td><input type="hidden" name="txtID" value="<?=$prod->id?>" /></td>
              <td><input  class="btn" type="submit" value="ADD TO CART" /></td>
          </table>
        </form>
            </div>
        </div>
    <?php } ?>

</section>
</body>