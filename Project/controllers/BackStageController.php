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
        $id = $_GET['id'];
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
	    $editShow = $this->model("MysqlAction");
	    $result = $editShow->editProduct($id);
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
        $item = $_POST['item'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $userName = $_COOKIE['userName'];
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
        $upload = $this->model("Upload");
	    $upload->backStageUpload($item, $price, $sale, $userName);
    }
    
    function update(){
        $item = $_POST['item'];
        $price = $_POST['price']; 
        $sale = $_POST['sale'];
        $id = $_POST['id'];
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
        $update = $this->model("Update");
	    $update->updateBackStageProducts($item, $price, $sale, $id);
    }
    
    function remove(){
        $id = $_GET['id'];
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $cd->sessionBackStageDecide();
	    $delete = $this->model("Delete");
        $delete->deleteProduct($id);
    }
    
    
    function auth(){
        session_start();
	    $_POST["password"] = md5($_POST["password"]);
        $auth = $this->model("Auth");
        $result = $auth->authPeopleBackstage();
        //判斷帳密是否一致
        if(in_array($_POST["userName"]." ".$_POST["password"], $result))
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
        if(isset($_POST["userName"]) && isset($_POST["password"]) && isset($_POST["email"]))
        {
    	    $_POST["password"] = md5($_POST["password"]);
            $signup = $this->model("Signup");
            $result = $signup->signUpBackstage();
            if($result == "success"){
                header("location: homePage");
            }else{
                header("location: loginPage");
            }
        }else {
             header("location: loginPage");
        }
    }
    
    function logout(){
        session_start();
        unset($_SESSION["userName"]);
        $logout = $this->model("Logout");
        $logout->backStageLogout();
    }
}

?>
    
