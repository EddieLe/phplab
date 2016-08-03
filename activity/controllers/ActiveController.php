<?php
class ActiveController extends Controller {
    
    function activePage(){
        
        $id = str_replace("\'","\'\'",$_GET['id']);
        $selectActive = $this->model("Active");
        $result = $selectActive->idSearch($id);
        $this->view("Party/join",$result);
    }
    function auth(){
        
        $name = str_replace("\'","\'\'",$_POST['name']);
        $number = str_replace("\'","\'\'",$_POST['number']);
        $id = str_replace("\'","\'\'",$_POST['id']);
        
        $auth = $this->model("Member");
        $result = $auth->auth($name,$number,$id);
        
        if($result){
            
            $count = str_replace("\'","\'\'",$_POST['flag']) + 1;
            $selectLimit = $this->model("Active");
            $resultArray = $selectLimit->idSearch($id);
            
            if($count > $resultArray['limit']-$resultArray['count']){
                echo "人數已滿";
            }else{
                echo "報名成功";
                $insertPeople = $this->model("Active");
                $insertPeople->insertPeople($count,$id);
                header("location: activePage");
            }
            
        }else{
            echo "資格不符";
        }
    }
}


?>