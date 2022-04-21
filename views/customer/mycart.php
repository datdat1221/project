
  
</body>
<link rel="stylesheet" href="assets/css/listproduct.css">
<body>
<?php require_once('views/layouts/customer_menu.php') ?>
  <section class="products" id="products">

  <?php foreach (unserialize($_SESSION['mycart'])->items as $item) { ?>
  
    <div class="box-container">
        <div class="box">
            <img src="data:image/jpg;base64,<?=$item->product->image?>"/>
            <div class="content">
                <h3 class="price"><?=$item->product->name?></h3>
              
                
                <div class="price">Giá: $<?=$item->product->price?></div>
                <div class="price">Số lượng: <?=$item->quantity?></div>
                <div class="price">$<?=$item->product->price * $item->quantity?></div>
                <a style="font-size:15px;position:relative;right:18px" href="?controller=customer&action=remove2cart&id=<?=$item->product->id?>">Remove</a>
                <a style="font-size:15px;position:relative;left:10px"href="?controller=customer&action=checkout" onclick="return confirm('ARE YOU SURE?')">Checkout</a>

                

            </div>
        </div>
    </div>
    <?php } ?>

</section>
</body>