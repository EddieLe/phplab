<?php
include "middleware/CookieDecide.php";

class ShoppingController extends Controller{
    
    function loginPage(){
        //清除錯誤訊息
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
        $this->model("Auth");
        $auth = new Auth();
        $auth->authPeopleShopping();
        
    }
    
    function products(){
        //清除錯誤訊息
        session_start();
        unset($_SESSION["duble"]);
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
        $this->model("MysqlAction");
        $mysqlAction = new MysqlAction();
        $result = $mysqlAction->selectProducts();
        $this->view("products/products",$result);
    }
    
    function shoppingCarPage(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $this->model("ShowCar");
        $showCar = new ShowCar();
        $result = $showCar->selectProducts();
        $this->view("products/shoppingCar",$result);
    }
    
    function checkPage(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $this->model("MysqlAction");
        $mysqlAction = new MysqlAction();
        $result = $mysqlAction->selectProducts();
        $this->view("products/checkPage",$result);
    }
    
    function addCar(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
        $this->model("Add");
        $add = new Add();
        $add->addShoppingCar();
    }
    
    function removeCar(){
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
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
        $this->model("Signup");
        $signup = new Signup();
        $signup->signUpShopping();
    }
    
    function payPage(){
        $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $this->model("MysqlAction");
        $payProducts = new MysqlAction();
        $result = $payProducts->payProducts();
        $this->view("products/payPage",$result);
    }
    
    function pay(){
        $cd = new CookieDecide();
	    $cd->cookieDecide();
        $this->model("PayLog");
        $paylog = new PayLog();
        $paylog->insertPayLog();
    }
    
    function aaa(){
        $this->model("Computting");
        $aaa = new Computting();
        $aaa->saleComputting();
    }
    
}
?>