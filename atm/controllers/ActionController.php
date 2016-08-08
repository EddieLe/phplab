<?php

class ActionController extends Controller 
{
    public function longin() 
    {
        $this->view("loginVeiw");
    }
    public function atm() 
    {
        $pay = $this->model("Pay");
        $account = $pay->takeAccount($_POST['account']);
        $this->view("atmView", $account);
    }
    public function take()
    {
        $pay = $this->model("Pay");
        $payArray = $pay->takeAccount($_POST['account']);
        //提款錢金額
        $total = $payArray['total'];
        $take = $this->model("Record");
        //剩下的金額
        $result = $total - $_POST['take'];
        $take->takeMoney($total, $_POST['account'], $result, $_POST['take']);
        $detaiArray = $take->selectDetail($_POST['account']);
        $this->view("detailVeiw",$detaiArray);
    }
    
    public function save()
    {
        $pay = $this->model("Pay");
        $payArray = $pay->takeAccount($_POST['account']);
        //提款錢金額
        $total = $payArray['total'];
        $save = $this->model("Record");
        //剩下的金額
        $result = $total + $_POST['save'];
        $save->saveMoney($total, $_POST['account'], $result, $_POST['save']);
        $detaiArray = $save->selectDetail($_POST['account']);
        $this->view("detailVeiw",$detaiArray);
    }
}

?>
    
