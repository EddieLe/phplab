<?php
include "middleware/CookieDecide.php";

class ShoppingController extends Controller{
    
    function loginPage(){
        //回登入頁清除帳號重複錯誤訊息
        unset($_SESSION["duble"]);
        //判斷有無登入過有就回商品頁
        $loginDecideShopping = $this->model("Decide");
        $decide = $loginDecideShopping->loginDecideShopping();
        if($decide){
            header("location: products");
            exit;
        }
        
        $this->view("products/Login");
    }
    
    function accountPage(){
        //判斷有無登入過有就回商品頁
        $loginDecideShopping = $this->model("Decide");
        $decide = $loginDecideShopping->loginDecideShopping();
        if($decide){
            header("location: products");
            exit;
        }
        $this->view("products/Account");
    }
    
    function auth(){
	    $_POST["password"] = md5($_POST["password"]);
        $auth = $this->model("Auth");
        $result = $auth->authPeopleShopping();
        //判斷帳密是否一致
        if(in_array($_POST["firstName"]." ".$_POST["password"], $result))
        {
            //設定session and cookie
            $setAuth = $this->model("Decide");
            $setAuth->setAuth();
            //重倒回ShoppingController function products
            header("location: products");
            
        }else
            //重倒回ShoppingController function loginPage
            header("location: loginPage");
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
    //     $cd = new CookieDecide();
	   // $cd->cookieDecide();
	   // $cd->sessionDecide();
    }
    
    function products(){
        //登入成功清除帳號重複錯誤訊息
        session_start();
        unset($_SESSION["duble"]);
	    $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
        $mysqlAction = $this->model("MysqlAction");
        $result = $mysqlAction->selectProductsPage();
        //判斷post page有沒有初值
        if(isset($_POST["page"])){
            echo json_encode($result);
        } else {
            $this->view("products/products",$result);   
        }
    }
    
    function shoppingCarPage(){
        $firstName = $_COOKIE['firstName'];
	    $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $showCar = $this->model("ShowCar");
        $result = $showCar->selectProducts($firstName);
        $this->view("products/shoppingCar",$result);
    }
    
    function checkPage(){
	    $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $mysqlAction = $this->model("MysqlAction");
        $result = $mysqlAction->selectProducts();
        $this->view("products/checkPage",$result);
    }
    
    function productInfo(){
        $id = $_GET['id'];
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $productInfo = $this->model("MysqlAction");
	    $result = $productInfo->productInfo($id);
	    $this->view("products/productInfo",$result);
    }
    
    function payMethod(){
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
        $this->view("products/payMethod");
    }
    
    function addCar(){
        $id = $_POST['id'];
        $firstName = $_COOKIE['firstName'];
	    $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
        $add = $this->model("Add");
        $add->addShoppingCar($id, $firstName);
        header("location: checkPage");
    }
    
    function removeCar(){
        $id = $_POST['sId'];
	    $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $delete = $this->model("Delete");
        $delete->deleteShoppingCar($id);
        header("location: shoppingCarPage");
    }
    
    function logout(){
        $logout = $this->model("Logout");
        $logout->shoppingLogout();
        header("location: loginPage");
    }
    
    function signUp(){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $sex = $_POST['sex'];
        $password = $_POST['password'];
        
        if(isset($_POST["firstName"]) && isset($_POST["password"]) && isset($_POST["email"]))
        {
            $password = md5($password);
            $signup = $this->model("Signup");
            $result = $signup->signUpShopping($firstName,$lastName,$email,$mobile,$sex,$password);

            if($result == "success"){
                header("location: products");
            }else{
                header("location: accountPage");
            }
        }else{
            header("location: accountPage");
        }
    }
    
    function payPage(){
        $firstName = $_COOKIE['firstName'];
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $payProducts = $this->model("MysqlAction");
        $result = $payProducts->payProducts($firstName);
        $this->view("products/payPage",$result);
    }
    
    function pay(){
        $id = $_POST['id'];
        $item = $_POST['item'];
        $firstName = $_COOKIE['firstName']; 
        $price = $_POST['price'];
        $count = $_POST['count']; 
        $payMethod = $_POST['payMethod'];
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieDecide();
	    $decideS = $Decide->sessionDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
        $paylog = $this->model("PayLog");
        $paylog->insertPayLog($id, $item, $firstName, $price, $count, $payMethod);
        header("location: shoppingCarPage"); 
    }
    
}
?>