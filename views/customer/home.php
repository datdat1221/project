<link rel="stylesheet" href="assets/css/home.css">
<script src="assets/js/script.js"></script>
<body class="customer">
  <?php require_once('views/layouts/customer_menu.php') ?>
  <section class="home" id="home">

    <div class="slide-container active">
        <div class="slide">
            <div class="content">
                <span>nike red shoes</span>
                <h3>nike metcon shoes</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maiores et eos eaque veritatis aut laboriosam earum dolorem iste atque.</p>
          
            </div>
            <div class="image">
                <img src="assets/images/home-shoe-1.png" class="shoe" alt="">
                <img src="assets/images/home-text-1.png" class="text" alt="">
            </div>
        </div>
    </div>
    <section class="service">

    <div class="box-container">

        <div class="box">
            <i class="fas fa-shipping-fast"></i>
            <h3>giao hàng nhanh</h3>
            <p>Dat'H Luôn giao hàng một cách nhanh chóng. Đảm bảo chất lượng đến tay người dùng.</p>
        </div>

        <div class="box">
            <i class="fas fa-undo"></i>
            <h3>hoàn trả sau 10 ngày</h3>
            <p>Cơ hội hoàn trả sau 10 ngày nếu có vấn đề về sản phẩm.</p>
        </div>

        <div class="box">
            <i class="fas fa-headset"></i>
            <h3>hỗ trợ 24/7</h3>
            <p>Phục vụ hỗ trợ 24/7 giúp khách hàng hiểu rõ hơn về sản phẩm mọi lúc</p>
        </div>

    </div>

</section>

</section>
<h1 class="heading"> new <span>products</span> </h1>
<section class="products" id="products">

    <?php foreach ($newprods as $prod) { ?>
  
    <div class="box-container">
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
    </div>
    <?php } ?>

</section>
<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Chi nhánh</h3>
            <a href="#">Sài Gòn</a>
            <a href="#">Hà Nội</a>
            <a href="#">Cần Thơ</a>
            <a href="#">Cà Mau</a>
        </div>

        <div class="box">
            <h3>Đi tới</h3>
            <a href="#">home</a>
            <a href="#">Nike</a>
            <a href="#">Vans</a>
            <a href="#">Adidas</a>
        </div>

        <div class="box">
            <h3>Dịch vụ</h3>
            <a href="#">Hỗ trợ 24/7</a>
            <a href="#">Tư vấn mẫu size</a>
            <a href="#">Giao hàng nhanh</a>
            <a href="#">Đổi trả trong 10 ngày</a>
        </div>

        <div class="box">
            <h3>Liên hệ</h3>
            <a href="#">facebook</a>
            <a href="#">twitter</a>
            <a href="#">instagram</a>
            <a href="#">linkedin</a>
        </div>

        <div class="credit">copy right <span> @ </span> | DH</div>

    </div>

</section>
</body>
<script type="text/javascript" src="assets/js/script.js"></script>