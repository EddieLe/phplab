<?php

class BackStageController extends Controller {

    function loginPage(){
        //判斷有無登入過有回設定商品頁
        $loginDecide = $this->model("Decide");
        $decide = $loginDecide->loginDecide();
        if($decide){
            header("location: homePage");
            exit;
        }
        
        $this->view("backstage/loginpage");
        
    }
    
    function homePage(){
	    $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieBackStageDecide();
	    $decideS = $Decide->sessionBackStageDecide();
	    $page = $_GET["page"];
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $selectMysqlAction = $this->model("MysqlAction");
	    $result = $selectMysqlAction->selectBackStageProducts($page);
        $this->view("backstage/homepage", $result);
    }
    
    function editPage(){
        $id = $_GET['id'];
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieBackStageDecide();
	    $decideS = $Decide->sessionBackStageDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $editShow = $this->model("MysqlAction");
	    $result = $editShow->editProduct($id);
	    $this->view("backstage/editpage",$result);
    }
    
    function reportPage(){
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieBackStageDecide();
	    $decideS = $Decide->sessionBackStageDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $report = $this->model("Report");
	    $result = $report->report();
        $this->view("backstage/reportpage",$result);
    }
    
    function uploadPage(){
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieBackStageDecide();
	    $decideS = $Decide->sessionBackStageDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $this->view("backstage/uploadpage");
    }
    
    function upload(){
        $item = $_POST['item'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $userName = $_COOKIE['userName'];
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieBackStageDecide();
	    $decideS = $Decide->sessionBackStageDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
        $upload = $this->model("Upload");
	    $error = $upload->backStageUpload($item, $price, $sale, $userName);
	    if(isset($error)){
	        $this->view("backstage/uploadpage",$error);
	        exit;
        }else
	    header("location: homePage"); 
    }
    
    function update(){
        $item = $_POST['item'];
        $price = $_POST['price']; 
        $sale = $_POST['sale'];
        $id = $_POST['id'];
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieBackStageDecide();
	    $decideS = $Decide->sessionBackStageDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
        $update = $this->model("Update");
	    $update->updateBackStageProducts($item, $price, $sale, $id);
	    header("location: homePage");
    }
    
    function remove(){
        $id = $_GET['id'];
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieBackStageDecide();
	    $decideS = $Decide->sessionBackStageDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
	    $delete = $this->model("Delete");
        $delete->deleteProduct($id);
        header("location: homePage");
    }
    
    
    function auth(){
	    $_POST["password"] = md5($_POST["password"]);
        $auth = $this->model("Auth");
        $result = $auth->authPeopleBackstage();
        //判斷帳密是否一致
        if(in_array($_POST["userName"]." ".$_POST["password"], $result))
        {
            $setAuth = $this->model("Decide");
            $setAuth->setAuth();
            header("location: homePage");
        }else
            header("location: loginPage");
        $Decide = $this->model("Decide");
	    $decideC = $Decide->cookieBackStageDecide();
	    $decideS = $Decide->sessionBackStageDecide();
	    if($decideC && $decideS){
	        header("location: loginPage");
	    }
    }
    
    function signUp(){
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        if(isset($_POST["userName"]) && isset($_POST["password"]) && isset($_POST["email"]))
        {
    	    $password = md5($password);
            $signup = $this->model("Signup");
            $result = $signup->signUpBackstage($userName, $password, $email);
            if($result == "success"){
                $setSession = $this->model("Decide");
                $setSession->setAuth();
                header("location: homePage");
            }else{
                header("location: loginPage");
            }
        }else {
             header("location: loginPage");
        }
    }
    
    function logout(){
        $logout = $this->model("Logout");
        $logout->backStageLogout();
        header("location: loginPage");
    }
}

?>
    
