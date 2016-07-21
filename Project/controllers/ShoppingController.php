<?php
include "middleware/CookieDecide.php";

class ShoppingController extends Controller{
    
    function loginPage(){
        //回登入頁清除帳號重複錯誤訊息
        session_start();
        unset($_SESSION["duble"]);
        //判斷有無登入過有就回商品頁
        if(isset($_COOKIE["firstName"])){
            header("location: products");
        }  
        $this->view("products/Login");
    }
    
    function accountPage(){
        $this->view("products/Account");
    }
    
    function auth(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
	    $_POST["password"] = md5($_POST["password"]);
        $this->model("Auth");
        $auth = new Auth();
        $auth->authPeopleShopping();
        
    }
    
    function products(){
        //登入成功清除帳號重複錯誤訊息
        session_start();
        unset($_SESSION["duble"]);
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
        $this->model("MysqlAction");
        $mysqlAction = new MysqlAction();
        $result = $mysqlAction->selectProducts();
        $this->view("products/products",$result);
    }
    
    function shoppingCarPage(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
	    $this->model("ShowCar");
        $showCar = new ShowCar();
        $result = $showCar->selectProducts();
        $this->view("products/shoppingCar",$result);
    }
    
    function checkPage(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
	    $this->model("MysqlAction");
        $mysqlAction = new MysqlAction();
        $result = $mysqlAction->selectProducts();
        $this->view("products/checkPage",$result);
    }
    
    function productInfo(){
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
	    $this->model("MysqlAction");
	    $productInfo = new MysqlAction();
	    $result = $productInfo->productInfo();
	    $this->view("products/productInfo",$result);
    }
    
    function payMethod(){
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
        $this->view("products/payMethod");
    }
    
    function addCar(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
        $this->model("Add");
        $add = new Add();
        $add->addShoppingCar();
    }
    
    function removeCar(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
	    $this->model("Delete");
        $delete = new Delete();
        $delete->deleteShoppingCar();
    }
    
    function logout(){
        $this->model("Logout");
        $logout = new Logout();
        $logout->shoppingLogout();
    }
    
    function signUp(){
        $_POST["password"] = md5($_POST["password"]);
        $this->model("Signup");
        $signup = new Signup();
        $signup->signUpShopping();
    }
    
    function payPage(){
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
	    $this->model("MysqlAction");
        $payProducts = new MysqlAction();
        $result = $payProducts->payProducts();
        $this->view("products/payPage",$result);
    }
    
    function pay(){
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	   // $cd->sessionDecide();
        $this->model("PayLog");
        $paylog = new PayLog();
        $paylog->insertPayLog();
    }
    
    function page(){
        $this->view("products/page");
    }
    
}
?>