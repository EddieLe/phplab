<?php

class HomeController extends Controller {
    
    function activity() {
        $this->view("Back/activity");
    }
    function create(){
        $title = $_POST["title"];
        $limit = $_POST["limit"];
        $start = $_POST["start"];
        $end = $_POST["end"];
        $flag = $_POST["flag"];
        $name = $_POST["name"];
        $number = $_POST["number"];
        $info = $_POST["info"];
        //輸入時間判斷
        if(strtotime($start) > strtotime($end)){
            // $this->view("Back/activity",array('error'=>"結束時間小於開始時間"));
            header("location: activity");
            
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
                $newActive = $this->model("NewActive");
                $result = $newActive->create($title,$limit,$flag,$start,$end,$name,$number,$info);
                $this->table();
            }else{
                // $this->view("Back/activity",array('error'=>"新增時間錯誤"));
                header("location: activity");
            }
    }
    
    function table(){
        $activeSelect = $this->model("SelectActive");
        $result = $activeSelect->search();
        $this->view("Back/table",$result);
    }
    
}

?>
    
