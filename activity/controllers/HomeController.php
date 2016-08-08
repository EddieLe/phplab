<?php

class HomeController extends Controller {
    
    function activity() {
        $this->view("Back/activity");
    }
    function create(){
        $title = str_replace("\'","\'\'",$_POST["title"]);
        $limit = str_replace("\'","\'\'",$_POST["limit"]);
        $start = str_replace("\'","\'\'",$_POST["start"]);
        $end = str_replace("\'","\'\'",$_POST["end"]);
        $flag = str_replace("\'","\'\'",$_POST["flag"]);
        $name = str_replace("\'","\'\'",$_POST["name"]);
        $number = str_replace("\'","\'\'",$_POST["number"]);
        $info = str_replace("\'","\'\'",$_POST["info"]);
        //輸入時間判斷
        if(strtotime($start) > strtotime($end)){
            //透過model寫入錯誤訊息
            $error = $this->model("Session");
            $error->sessionErrorActive('error');
            header("location: activity");
            exit;
        }
        $now = strtotime(date('Y-m-d'));
        $deadline = strtotime($start);
            //新增日期判斷
        if($now <= $deadline){
            //轉換日期格式
            $startArray = explode("-",$start);
            $endArray = explode("-",$end);
            $start = "$startArray[0]/$startArray[1]/$startArray[2]";
            $end = "$endArray[0]/$endArray[1]/$endArray[2]";
            $newActive = $this->model("Active");
            $result = $newActive->create($title,$limit,$flag,$start,$end,$name,$number,$info);
            header("location: table");
            exit;
        }else{
            //透過model寫入錯誤訊息
            $error = $this->model("Session");
            $error->sessionErrorActive('error');
            header("location: activity");
        }
    }
    
    function ajax(){
        //使controller 不含echo 多建立ajax method將資料撈出投向view("Back/ajax")
        $activeSelect = $this->model("Active");
        $result = $activeSelect->search();
        $polling = json_encode($result);
        $this->view("Back/ajax",$polling);
    }
    function table(){
        $activeSelect = $this->model("Active");
        $result = $activeSelect->search();
        $this->view("Back/table",$result);
    }
    
}

?>
    
