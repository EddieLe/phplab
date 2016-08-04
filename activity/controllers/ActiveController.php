<?php
class ActiveController extends Controller {
    
    function activePage(){
        // $this->ajax();
        $id = str_replace("\'","\'\'",$_GET['id']);
        $selectActive = $this->model("Active");
        $result = $selectActive->idSearch($id);
        // if(isset($id)){
        //     echo $id;
        // }
        $this->view("Party/join",$result);
    }
    function auth(){
        
        $name = str_replace("\'","\'\'",$_POST['name']);
        $number = str_replace("\'","\'\'",$_POST['number']);
        $id = str_replace("\'","\'\'",$_POST['id']);
        $start = str_replace("\'","\'\'",$_POST['start']);
        $end = str_replace("\'","\'\'",$_POST['end']);
        
        $auth = $this->model("Member");
        $result = $auth->auth($name,$number,$id);
        //判斷時間區間
        if(strtotime("now") < strtotime($start)){
            $sessionError = $this->model("Session");
            $sessionError->sessionError($info = "early");
            header("location: activePage?id=$id");
            exit;
            
        }elseif (strtotime("now") > strtotime($end)) {
            $sessionError = $this->model("Session");
            $sessionError->sessionError($info = "late");
            header("location: activePage?id=$id");
            exit;
        }
        //判斷是否可報名
        if($result){
            
            $count = str_replace("\'","\'\'",$_POST['flag']) + 1;
            $selectLimit = $this->model("Active");
            $resultArray = $selectLimit->idSearch($id);
            
            //判斷人數上限
            if($count > $resultArray['limit']-$resultArray['count']){
                $sessionError = $this->model("Session");
                $sessionError->sessionError($info = "full");
                //將資料庫關閉
                $closeSql = $this->model("Active");
                $closeSql->closeSql();
                header("location: activePage?id=$id");
                
            }elseif ($result['flag'] == 1) {
                $sessionError = $this->model("Session");
                $sessionError->sessionError($info = "has");
                header("location: activePage?id=$id");
                
            }else{
                $flag = 1;
                $tatleCount = $resultArray['count'] + $count;
                $insertPeople = $this->model("Active");
                $insertPeople->insertPeople($tatleCount,$id);
                $insertFlag = $this->model("Member");
                $insertFlag->insertFlag($id,$name,$number,$flag);
                $sessionError = $this->model("Session");
                $sessionError->sessionError($info = "ready");
                header("location: activePage?id=$id");
            }
            
        }else{
            $sessionError = $this->model("Session");
            $sessionError->sessionError($info = "fail");
            header("location: activePage?id=$id");
        }
    }
    function ajax(){
        $id = str_replace("\'","\'\'",$_GET['id']);
        $activeSelect = $this->model("Active");
        $result = $activeSelect->idSearch($id);
        // echo $id;
        // var_dump($result);
        $take = json_encode($result);
        // echo $take;
        $this->view("Party/ajax",$take);
    }
}


?>