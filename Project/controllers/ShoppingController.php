<?php
include "middleware/CookieDecide.php";

class ShoppingController extends Controller{
    
    function loginPage(){
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
	    $this->model("MysqlAction");
        $mysqlAction = new MysqlAction();
        $result = $mysqlAction->selectProducts();
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
    
    
}
?>