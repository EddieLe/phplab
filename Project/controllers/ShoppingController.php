<?php
class ShoppingController extends Controller{
    
    function loginPage(){
        $this->view("products/Login");
    }
    
    function accountPage(){
        $this->view("products/Account");
    }
    
    function auth(){
        include "middleware/CookieDecide.php";
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
        $this->model("Auth");
        $auth = new Auth();
        $auth->authPeopleShopping();
        
    }
    
    function products(){
        include "middleware/CookieDecide.php";
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
        $this->model("MysqlAction");
        $mysqlAction = new MysqlAction();
        $result = $mysqlAction->selectProducts();
        $this->view("products/products",$result);
    }
    
    function shoppingCarPage(){
        include "middleware/CookieDecide.php";
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $this->model("MysqlAction");
        $mysqlAction = new MysqlAction();
        $result = $mysqlAction->selectProducts();
        $this->view("products/shoppingCar",$result);
    }
    
    function checkPage(){
        include "middleware/CookieDecide.php";
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $this->model("MysqlAction");
        $mysqlAction = new MysqlAction();
        $result = $mysqlAction->selectProducts();
        $this->view("products/checkPage",$result);
    }
    
    function addCar(){
        include "middleware/CookieDecide.php";
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
        $this->model("Add");
        $add = new Add();
        $add->addShoppingCar();
    }
    
    function removeCar(){
        include "middleware/CookieDecide.php";
	    $cd = new CookieDecide();
	    $cd->cookieDecide();
	    $this->model("Delete");
        $delete = new Delete();
        $delete->deleteShoppingCar();
    }
    
    function login(){
        echo"123";
    }
    
    function logout(){
        
    }
    
    function signUp(){
        
    }
    
    
}
?>