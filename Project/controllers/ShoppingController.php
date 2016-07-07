<?php
class ShoppingController extends Controller{
    
    function loginPage(){
        $user = $this->model("User");
        $this->view("products/login", $user);
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