<?php

class ActionController extends Controller 
{
    public function longin() 
    {
        $this->view("loginVeiw");
    }
    public function atm() 
    {
        $_SESSION['account'] = $_POST['account'];
        $pay = $this->model("Pay");
        $account = $pay->takeAccount($_SESSION['account']);
        $this->view("atmView", $account);
    }
    public function take()
    {
        $_SESSION['account'] = $_POST['account'];
        $pay = $this->model("Pay");
        $payArray = $pay->takeAccount($_POST['account']);
        //提款錢金額
        $total = $payArray['total'];
        $take = $this->model("Record");
        //剩下的金額
        $result = $total - $_POST['take'];
        $take->takeMoney($total, $_POST['account'], $result, $_POST['take']);
        $this->atm();
    }
    
    public function save()
    {
        $_SESSION['account'] = $_POST['account'];
        $pay = $this->model("Pay");
        $payArray = $pay->takeAccount($_POST['account']);
        //提款錢金額
        $total = $payArray['total'];
        $save = $this->model("Record");
        //剩下的金額
        $result = $total + $_POST['save'];
        $save->saveMoney($total, $_POST['account'], $result, $_POST['save']);
        $this->atm();
    }
    
    public function detail()
    {
        $detail = $this->model("Record");
        $detaiArray = $detail->selectDetail($_POST['account']);
        $this->view("detailVeiw",$detaiArray);
    }
}

?>
    
