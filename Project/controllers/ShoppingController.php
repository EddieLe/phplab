<?php
class ShoppingController extends Controller{
    
    function loginPage(){
        $this->view("products/Login");
    }
    
    function accountPage(){
        $this->view("products/Account");
    }
    
    function auth(){
    //     include "middleware/CookieDecide.php";
	   // $cd = new CookieDecide();
	   // $cd->cookieDecide();
        $this->model("Auth");
        $auth = new Auth();
        $auth->authPeopleShopping();
        $mysqlAction = new MysqlAction();
        $mysqlAction->selectProducts();
        $this->view("products/products",$result);
    }
    
    
    function login(){
        echo"123";
    }
    
    function logout(){
        
    }
    
    function signUp(){
        
    }
    
    function addCar(){
        
    }
    
    function removeCar(){
        
    }
}
?>