<?php
include "middleware/CookieBackStageDecide.php";

class BackStageController extends Controller {

    function loginPage(){
        //移掉錯誤訊息
        session_start();
        unset($_SESSION["duble"]);
        //判斷有無登入過有回設定商品頁
        if(isset($_COOKIE["userName"])){
            header("location: homePage");
        }
        $this->view("backstage/loginpage");
    }
    
    function homePage(){
        //刪除以上傳後的錯誤訊息session error
        session_start();
        unset($_SESSION["duble"]);
        unset($_SESSION["error"]);
	    $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    //$cd->sessionBackStageDecide();
	    $this->model("MysqlAction");
	    $selectMysqlAction = new MysqlAction();
	    $result = $selectMysqlAction->selectBackStageProducts();
        $this->view("backstage/homepage", $result);
    }
    
    function editPage(){
        //顯示記錄錯誤訊息
        session_start();
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	   // $cd->sessionBackStageDecide();
	    $this->model("MysqlAction");
	    $editShow = new MysqlAction();
	    $result = $editShow->editProduct();
	    $this->view("backstage/editpage",$result);
    }
    
    function reportPage(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	   // $cd->sessionBackStageDecide();
	    $this->model("Report");
	    $report = new Report();
	    $result = $report->report();
        $this->view("backstage/reportpage",$result);
    }
    
    function uploadPage(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	   // $cd->sessionBackStageDecide();
	    $this->view("backstage/uploadpage");
    }
    
    function upload(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	   // $cd->sessionBackStageDecide();
        $this->model("Upload");
	    $upload = new Upload();
	    $upload->backStageUpload();
    }
    
    function update(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	   // $cd->sessionBackStageDecide();
        $this->model("Update");
	    $update = new Update();
	    $update->updateBackStageProducts();
    }
    
    function remove(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	   // $cd->sessionBackStageDecide();
	    $this->model("Delete");
        $delete = new Delete();
        $delete->deleteProduct();
    }
    
    
    function auth(){
        session_start();
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	   // $cd->sessionBackStageDecide();
	    $_POST["password"] = md5($_POST["password"]);
        $this->model("Auth");
        $auth = new Auth();
        $auth->authPeopleBackstage();
    }
    
    function signUp(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	   // $cd->sessionBackStageDecide();
	    $_POST["password"] = md5($_POST["password"]);
        $this->model("Signup");
        $signup = new Signup();
        $signup->signUpBackstage();
    }
    
    function logout(){
        unset($_SESSION["userName"]);
        $this->model("Logout");
        $logout = new Logout();
        $logout->backStageLogout();
    }
}

?>
    
