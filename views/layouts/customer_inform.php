<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="border-bottom">
  <div class="float-left">
    <?php if (isset($_SESSION['customer'])) { ?>
    Hello <b><?= unserialize($_SESSION['customer'])->name ?></b> |
    <a href="?controller=customer&action=logout">Logout</a> |
    <a href="?controller=customer&action=myprofile">My profile</a> |
    <a href="?controller=customer&action=myorders">My orders</a>
    <?php } else { ?>
    <a href="?controller=customer&action=login" class="fas fa-user"></a>
 
    <?php } ?>
  </div>
  <div class="float-right">
  <a href="?controller=customer&action=mycart" class="fas fa-shopping-cart"></a>  -  have <b><?= isset($_SESSION['mycart']) ? unserialize($_SESSION['mycart'])->getSize() : 0 ?></b> items

  </div>
<style>
  .border-bottom{
    display:flex;
    font-size: 15px;
  }
  .float-left{
    padding-right:10px;
  }
  .fa, .fas{
    color:black;
  }
</style>


</div>
