<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile</title>
</head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <script src="https://kit.fontawesome.com/2916629c7b.js" crossorigin="anonymous"></script>
<body class="customer">
  <?php require_once('views/layouts/customer_menu.php') ?>
  <?php require_once('views/layouts/customer_inform.php') ?>

    <form action="?controller=customer&action=myprofile" method="POST">
    <div class="col-xl-6 col-md-12" style="position:absolute;top:20%;left:20%;font-size:13px;height:100px">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                    <input style="text-align:center" type="text" name="txtName" value="<?= unserialize($_SESSION['customer'])->name ?>" required />
                                    <p>Sinh viên Trường Đại Học Văn Lang</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h3 class="m-b-20 p-b-5 b-b-default f-w-600">Thông tin cá nhân</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Họ và tên</p>
                                            <td><input type="text" name="txtName" value="<?= unserialize($_SESSION['customer'])->name ?>" required /></td>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">User name</p>
                                            <input type="text" name="txtUsername" value="<?= unserialize($_SESSION['customer'])->username ?>" readonly />
                                        </div>
                                  

                                        
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <input type="email" name="txtEmail" value="<?= unserialize($_SESSION['customer'])->email ?>" readonly />
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Password</p>
                                            <input type="password" name="txtPassword" value="<?= unserialize($_SESSION['customer'])->password ?>" pattern=".{3,}" required />
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600" style="margin-top: 1rem">Số điện thoại</p>
                                            <input type="tel" name="txtPhone" value="<?= unserialize($_SESSION['customer'])->phone ?>" pattern="0[0-9]{9}" required />
                                        </div>
                                        <div class="col-sm-6">
                                     
                                        <input style="position:relative;top:40%;" type="submit" name="btnSubmit" value="UPDATE" />
                                        
                                        </div>
                                    </div>

                                </div>
                           
                            </div>
                        </div>
                    </div>
                </div>
  </div>
  </form>
</body>