<?php
include "middleware/CookieBackStageDecide.php";

class BackStageController extends Controller {

    function loginPage(){
        //判斷有無登入過有回設定商品頁
        if(isset($_COOKIE["userName"])){
            header("location: homePage");
        }  
        $this->view("backstage/loginpage");
    }
    
    function homePage(){
        //刪除以上傳後的錯誤訊息session error
        session_start();
        unset($_SESSION["error"]);
	    $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $this->model("MysqlAction");
	    $selectMysqlAction = new MysqlAction();
	    $result = $selectMysqlAction->selectProducts();
        $this->view("backstage/homepage", $result);
    }
    
    function editPage(){
        //顯示記錄錯誤訊息
        session_start();
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $this->model("MysqlAction");
	    $editShow = new MysqlAction();
	    $result = $editShow->editProduct();
	    $this->view("backstage/editpage",$result);
    }
    
    function updatePage(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $this->view("backstage/updatepage");
    }
    
    function upload(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
        $this->model("Upload");
	    $upload = new Upload();
	    $upload->backStageUpload();
    }
    
    function update(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
        $this->model("Update");
	    $update = new Update();
	    $update->updateBackStageProducts();
    }
    
    function remove(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
	    $this->model("Delete");
        $delete = new Delete();
        $delete->deleteProduct();
    }
    
    function auth(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
        $this->model("Auth");
        $auth = new Auth();
        $auth->authPeopleBackstage();
    }
    
    function signUp(){
        $cd = new CookieBackStageDecide();
	    $cd->cookieBackStageDecide();
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
    
