<?php
require_once('controllers/base_controller.php');
require_once('utils/MyUtil.php');
require_once('models/Admin.php');
require_once('models/AdminDAO.php');
require_once('models/Category.php');
require_once('models/CategoryDAO.php');
require_once('models/Product.php');
require_once('models/ProductDAO.php');
require_once('models/Customer.php');
require_once('models/CustomerDAO.php');
require_once('models/COrder.php');
require_once('models/COrderDAO.php');
require_once('models/OrderDetail.php');
require_once('models/OrderDetailDAO.php');
require_once('utils/EmailUtil.php');



class AdminController extends BaseController
{
  function __construct()
  {
    $this->folder = 'admin';
  }

  public function home()
  {
    if ($_SESSION['admin'] != null) {
      $this->render('home');
    } else {
      header('Location:?controller=admin&action=login');
    }
  }
  // login | logout
  public function login()
  {
    if (isset($_POST['btnSubmit'])) { // POST
      $username = $_POST['txtUsername'];
      $password = $_POST['txtPassword'];
      $admin = AdminDAO::selectByUsername($username);
      if ($admin != null && $admin->password == $password) {
        $_SESSION['admin'] = serialize($admin);
        header('Location:?controller=admin&action=home');
      } else {
        //   MyUtil::showAlertAndRedirect('SORRY BABY!', '?controller=admin&action=login');
        $data = array('msg'=>'Username or password is not correct!');
        $this->render('login', $data);
       
      }
    } else { // GET
      $this->render('login');
    }
  }
  public function logout()
  {
    unset($_SESSION['admin']);
    header('Location:?controller=admin&action=home');
  }
  public function listcategory()
  {
    $cates = CategoryDAO::selectAll();
    $data = array('cates' => $cates);
    $this->render('listcategory', $data);
  }
  // 
  public function addcategory()
  {
    $name = $_POST['txtName'];
    $cate = new Category(0, $name);
    $result = CategoryDAO::insert($cate);
    $dbCat = CategoryDAO::selectAll($name);
    if(($dbCat !=  null )) {
      $_SESSION['adadstatus'] = "Category already exists!";
      $_SESSION['adstatus_code'] = "warning";
      header('Location:?controller=admin&action=listcategory');
      if ($result) {
        $_SESSION['adstatus'] = "Add category successfully!";
        $_SESSION['adstatus_code'] = "success";
        header('Location:?controller=admin&action=listcategory');
      } else {
        $_SESSION['adstatus'] = "Add category failed!";
        $_SESSION['adstatus_code'] = "error";
        header('Location:?controller=admin&action=listcategory');
      }
    }
  }
  public function updatecategory()
  {
    $id = $_POST['txtID'];
    $name = $_POST['txtName'];
    $cate = new Category($id, $name);
    $result = CategoryDAO::update($cate);
    if ($result) {
      $_SESSION['adstatus'] = "Update category successfully!";
      $_SESSION['adstatus_code'] = "success";
      header('Location:?controller=admin&action=listcategory');
    } else {
      $_SESSION['adstatus'] = "Update category failed!";
      $_SESSION['adstatus_code'] = "error";
      header('Location:?controller=admin&action=listcategory');
    }
  }
  public function deletecategory()
  {
    $id = $_POST['txtID'];
    $result = CategoryDAO::delete($id);
    if ($result) {
      $_SESSION['adstatus'] = "Delete category successfully!";
      $_SESSION['adstatus_code'] = "success";
      header('Location:?controller=admin&action=listcategory');
    } else {
      $_SESSION['adstatus'] = "Delete category failed!";
      $_SESSION['adstatus_code'] = "error";
      header('Location:?controller=admin&action=listcategory');
    }
  }
  public function listproduct()
  {
    $cates = CategoryDAO::selectAll();
    $prods = ProductDAO::selectAll();
    $data = array('cates' => $cates, 'prods' => $prods);
    $this->render('listproduct', $data);
  }
  public function addproduct()
  {
    $name = $_POST['txtName'];
    $price = $_POST['txtPrice'];
    $cateid = $_POST['cmbCategory'];
    $file = $_FILES['fileImage'];
    if ($file['name'] != '') {
      $image = base64_encode(file_get_contents($file['tmp_name']));
      $cdate = round(microtime(true) * 1000); // now in milliseconds
      $prod = new Product(0, $name, $price, $image, $cdate, $cateid);
      $result = ProductDAO::insert($prod);
      if ($result) {
        $_SESSION['adstatus'] = "Add product successfully!";
        $_SESSION['adstatus_code'] = "success";
        header('Location:?controller=admin&action=listproduct');
      }
    }
      $_SESSION['adstatus'] = "Add category failed!";
      $_SESSION['adstatus_code'] = "error";
      header('Location:?controller=admin&action=listproduct');

  }
  public function updateproduct()
  {
    $id = $_POST['txtID'];
    $name = $_POST['txtName'];
    $price = $_POST['txtPrice'];
    $cateid = $_POST['cmbCategory'];
    $file = $_FILES['fileImage'];
    if ($file['name'] != '') {
      $image = base64_encode(file_get_contents($file['tmp_name']));
    } else {
      $dbProd = ProductDAO::selectByID($id);
      $image = $dbProd->image;
    }
    $cdate = round(microtime(true) * 1000); // now in milliseconds
    $prod = new Product($id, $name, $price, $image, $cdate, $cateid);
    $result = ProductDAO::update($prod);
    if ($result) {
      $_SESSION['adstatus'] = "Update product completed!";
      $_SESSION['adstatus_code'] = "success";
      header('Location:?controller=admin&action=listproduct');
    } else {
      $_SESSION['adstatus'] = "Update product failed!";
      $_SESSION['adstatus_code'] = "error";
      header('Location:?controller=admin&action=listproduct');
    }
  }
  public function deleteproduct()
  {
    $id = $_POST['txtID'];
    $result = ProductDAO::delete($id);
    if ($result) {
      $_SESSION['adstatus'] = "Delete product completed!";
      $_SESSION['adstatus_code'] = "success";
      header('Location:?controller=admin&action=listproduct');
    } else {
      $_SESSION['adstatus'] = "Delete product failed!";
      $_SESSION['adstatus_code'] = "error";
      header('Location:?controller=admin&action=listproduct');
    }
  }
  public function listorder()
  {
    $orders = COrderDAO::selectAll();
    $data = array('orders' => $orders);
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $odetails = OrderDetailDAO::selectByOrderID($id);
      $data += array('odetails' => $odetails);
    }
    $this->render('listorder', $data);
  }
  public function updatestatus()
  {
    $id = $_GET['id'];
    $status = $_GET['status'];
    COrderDAO::update($id, $status);
    header('Location:?controller=admin&action=listorder&id=' . $id);
  }
  public function listcustomer()
  {
    $custs = CustomerDAO::selectAll();
    $data = array('custs' => $custs);
    if (isset($_GET['cid'])) {
      $cid = $_GET['cid'];
      $orders = COrderDAO::selectByCustID($cid);
      $data += array('orders' => $orders);
      if (isset($_GET['oid'])) {
        $oid = $_GET['oid'];
        $odetails = OrderDetailDAO::selectByOrderID($oid);
        $data += array('odetails' => $odetails);
      }
    }
    $this->render('listcustomer', $data);
  }
  public function deactive()
  {
    $id = $_GET['id'];
    $token = $_GET['token'];
    $result = CustomerDAO::active($id, $token, 0);
    if ($result) {
      $_SESSION['adstatus'] = "Deactive successfully!";
      $_SESSION['adstatus_code'] = "success";
      header('Location:?controller=admin&action=listcustomer');
    } else {
      $_SESSION['adstatus'] = "Deactive failed!";
      $_SESSION['adstatus_code'] = "error";
      header('Location:?controller=admin&action=listcustomer');
    }
  }
  public function sendmail()
  {
    $id = $_GET['id'];
    $cust = CustomerDAO::selectByID($id);
    if ($cust != null) {
      $subject = 'Signup | Verification';
      $content = 'Thanks for signing up! Please click this link to activate your account:<br/>';
      $content .= 'http:localhost:5050/?controller=customer&action=verify&id=' . $cust->id . '&token=' . $cust->token;
      $result = EmailUtil::send($cust->email, $subject, $content);
      if ($result) {
        $_SESSION['adstatus'] = "Please check your email!";
        $_SESSION['adstatus_code'] = "warning";
        header('Location:?controller=admin&action=listcustomer');
      } else {
        $_SESSION['adstatus'] = "Your email failure!";
        $_SESSION['adstatus_code'] = "error";
        header('Location:?controller=admin&action=listcustomer');
      }
    } else {
      header('Location:?controller=admin&action=listcustomer');
    }
  }
}
