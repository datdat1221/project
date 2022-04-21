<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/homeadmin.css">
<div class="border-bottom">


  <div class="float-clear"></div>
  <header>
    <a href="#" class="logo">nike</a>

    <nav class="navbar">
    <a href="?controller=admin&action=home">Home</a>
    <a href="?controller=admin&action=listcategory">Category</a>
    <a href="?controller=admin&action=listproduct">Product</a>
    <a href="?controller=admin&action=listorder">Order</a></li>
    <a href="?controller=admin&action=listcustomer">Customer</a>
   
 
    </nav>
    <div class="navbar"> <i><?= unserialize($_SESSION['admin'])->username ?></i> | <a href="?controller=admin&action=logout">Logout</a></div>

 

</header>
</div>