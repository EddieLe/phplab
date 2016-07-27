<?php
include "middleware/CookieBackStageDecide.php";

class BackStageController extends Controller {

    function loginPage(){
        //移掉錯誤訊息
        session_start();
        unset($_SESSION["duble"]);
        //判斷有無登入過有回設定商品頁
        if(isset($_COOKIE["userName"]) && isset($_SESSION["userName"])){
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
	    $cd->sessionBackStageDecide();
	    $selectMysqlAction = $this->model("MysqlAction");
	    $result = $selectMysqlAction->selectBackStageProducts();
        $this->view("backstage/homepage", $result);
    }
    
    function editPage(){
        //顯示記錄錯誤訊息
        session_start();
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
	    $editShow = $this->model("MysqlAction");
	    $result = $editShow->editProduct();
	    $this->view("backstage/editpage",$result);
    }
    
    function reportPage(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
	    $report = $this->model("Report");
	    $result = $report->report();
        $this->view("backstage/reportpage",$result);
    }
    
    function uploadPage(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
	    $this->view("backstage/uploadpage");
    }
    
    function upload(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
        $upload = $this->model("Upload");
	    $upload->backStageUpload();
    }
    
    function update(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
        $update = $this->model("Update");
	    $update->updateBackStageProducts();
    }
    
    function remove(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
	    $delete = $this->model("Delete");
        $delete->deleteProduct();
    }
    
    
    function auth(){
        session_start();
        
	    $_POST["password"] = md5($_POST["password"]);
        $auth = $this->model("Auth");
        $auth->authPeopleBackstage();
        //判斷帳密是否一致
        if(in_array($_POST["userName"]." ".$_POST["password"], $arrayUserName))
        {
            setcookie("userName",$_POST["userName"]);
            $_SESSION['userName'] = $_POST["userName"];
            header("location: homePage");
        }else
            header("location: loginPage");
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
    }
    
    function signUp(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
	    $_POST["password"] = md5($_POST["password"]);
        $signup = $this->model("Signup");
        $signup->signUpBackstage();
    }
    
    function logout(){
        session_start();
        unset($_SESSION["userName"]);
        $logout = $this->model("Logout");
        $logout->backStageLogout();
    }
}

?>
    
