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
}

?>
    
