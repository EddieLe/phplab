<?php
include "middleware/CookieDecide.php";

class BackStageController extends Controller {

    function loginPage(){
        if(isset($_COOKIE["userName"])){
            header("location: homePage");
        }  
        $this->view("backstage/loginpage");
    }
    
    function homePage(){
    //     include "middleware/CookieDecide.php";
	   // $cd = new CookieDecide();
	   // $cd->cookieBackStageDecide();
	    $this->model("MysqlAction");
	    $selectMysqlAction = new MysqlAction();
	    $result = $selectMysqlAction->selectProducts();
        $this->view("backstage/homepage", $result);
    }
    
    function editPage(){
    //     include "middleware/CookieDecide.php";
	   // $cd = new CookieDecide();
	   // $cd->cookieBackStageDecide();
	   
	    $this->view("backstage/editpage");
    }
    
    function updatePage(){
    //     include "middleware/CookieDecide.php";
	   // $cd = new CookieDecide();
	   // $cd->cookieBackStageDecide();
	    $this->view("backstage/updatepage");
    }
    
    function upload(){
        $this->model("Upload");
	    $upload = new Upload();
	    $upload->backStageUpload();
    }
    
    function update(){
        $this->model("Update");
	    $update = new Update();
	    $update->updateBackStageProducts();
    }
    
    function remove(){
        
	    $this->model("Delete");
        $delete = new Delete();
        $delete->deleteProduct();
    }
    
    function auth(){
        include "middleware/CookieDecide.php";
	    $cd = new CookieDecide();
	    $cd->cookieBackStageDecide();
        $this->model("Auth");
        $auth = new Auth();
        $auth->authPeopleBackstage();
    }
    
    function signUp(){
       // include "middleware/CookieDecide.php";
	   // $cd = new CookieDecide();
	   // $cd->cookieBackStageDecide();
        $this->model("Signup");
        $signup = new Signup();
        $signup->signUpBackstage();
    }
    
    function logout(){
        $this->model("Logout");
        $logout = new Logout();
        $logout->backStageLogout();
    }
}

?>
    
