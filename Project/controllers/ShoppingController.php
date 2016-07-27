<?php
include "middleware/CookieDecide.php";

class ShoppingController extends Controller{
    
    function loginPage(){
        //回登入頁清除帳號重複錯誤訊息
        session_start();
        unset($_SESSION["duble"]);
        //判斷有無登入過有就回商品頁
        if(isset($_COOKIE["firstName"]) && isset($_SESSION["firstName"])){
            header("location: products");
        }  
        $this->view("products/Login");
    }
    
    function accountPage(){
        //判斷有無登入過有就回商品頁
        session_start();
        if(isset($_COOKIE["firstName"]) && isset($_SESSION["firstName"])){
            header("location: products");
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
            setcookie("firstName",$_POST["firstName"]);
            $_SESSION["firstName"] = $_POST["firstName"];
            //重倒回ShoppingController function products
            header("location: products");
            
        }else
            //重倒回ShoppingController function loginPage
            header("location: loginPage");
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
    }
    
    function products(){
        //登入成功清除帳號重複錯誤訊息
        session_start();
        unset($_SESSION["duble"]);
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
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
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
	    $showCar = $this->model("ShowCar");
        $result = $showCar->selectProducts();
        $this->view("products/shoppingCar",$result);
    }
    
    function checkPage(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
	    $mysqlAction = $this->model("MysqlAction");
        $result = $mysqlAction->selectProducts();
        $this->view("products/checkPage",$result);
    }
    
    function productInfo(){ 
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
	    $productInfo = $this->model("MysqlAction");
	    $result = $productInfo->productInfo();
	    $this->view("products/productInfo",$result);
    }
    
    function payMethod(){
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
        $this->view("products/payMethod");
    }
    
    function addCar(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
        $add = $this->model("Add");
        $add->addShoppingCar();
        header("location: checkPage");
    }
    
    function removeCar(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
	    $delete = $this->model("Delete");
        $delete->deleteShoppingCar();
    }
    
    function logout(){
        session_start();
        unset($_SESSION);
        $logout = $this->model("Logout");
        $logout->shoppingLogout();
    }
    
    function signUp(){
        $_POST["password"] = md5($_POST["password"]);
        $signup = $this->model("Signup");
        $signup->signUpShopping();
    }
    
    function payPage(){
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
	    $payProducts = $this->model("MysqlAction");
        $result = $payProducts->payProducts();
        $this->view("products/payPage",$result);
    }
    
    function pay(){
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $cd->sessionDecide();
        $paylog = $this->model("PayLog");
        $paylog->insertPayLog();
    }
    
    
}
?>