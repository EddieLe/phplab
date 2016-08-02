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
        //輸入時間判斷
        if(strtotime($start) > strtotime($end)){
            echo "時間輸入錯誤";
            header("location: activity");
        }
        $now = strtotime(date('Y-m-d'));
        $deadline = strtotime($start);
            //新增日期判斷
            if($now <= $deadline){
                echo "可新增";
                $newActive = $this->model("NewActive");
                $result = $newActive->create($title,$limit,$start,$end,$flag);
                header("location: table");
            }else{
                echo "不可新增";
                header("location: activity");
            }
    }
    
    function table(){
        $activeSelect = $this->model("NewActive");
        $this->view("Back/table",$result);
    }
    
}

?>
    
