<?php
class ActiveController extends Controller {
    
    function activePage(){
        $id = $_GET['id'];
        $selectActive = $this->model("SelectActive");
        $result = $selectActive->idSearch($id);
        $this->view("Party/join",$result);
    }
    function auth(){
        $name = $_POST['name'];
        $number = $_POST['number'];
        $id = $_POST['id'];
        
        $auth = $this->model("Auth");
        $result = $auth->auth();
        for($i = 0; $i <count($result); $i++){
            $authString[$i] = $result[$i]['active']."".$result[$i]['name']."".$result[$i]['number'];
        }
        if(in_array($_POST['id']."".$_POST['name']."".$_POST['number'],$authString)){
            
        }
        echo $authString[0];
        exit;
        var_dump($result);
        // if()
        // $id = 
    }
}
?>