<link rel="stylesheet" href="assets/css/style.css">
<header>

<a href="?controller=customer&action=home" class="logo">Dat'H</a>
<div class="float-left">
    <ul class="menu">
      <li class="menu"><a href="?controller=customer&action=home">Home</a></li>
      <?php if (isset($cates)) { foreach ($cates as $cate) { ?>
      <li class="menu"><a href="?controller=customer&action=listproduct&cateid=<?=$cate->id?>"><?=$cate->name?></a></li>
      <?php } } ?>
      
    </ul>
  </div>
  <div class="float-left">
    <form action="?controller=customer&action=search" method="POST" class="search">
      <input type="search" name="txtKeyword" placeholder="  Enter keyword" class="keyword" required
        oninvalid="this.setCustomValidity('Keyword cannot be empty')"
        oninput="this.setCustomValidity('')" />
      <input class="keyword" type="submit" value="SEARCH" />
    </form>
  </div>
  <div class="float-clear"></div>
  <div class= "inform"> <?php require_once('views/layouts/customer_inform.php') ?></div>
  <?php require_once('views/layouts/customer_inform.php') ?>
 
</header>
  