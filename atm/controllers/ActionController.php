<?php

class ActionController extends Controller
{
    public function login()
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

        $total = $payArray['total'];
        $take = $this->model("Record");

        $result = $total - $_POST['take'];
        if ($result < 0) {
            $error = $this->model("Session");
            $error->sessionErrorAction("error");
            $this->atm();
        } else {
            $take->takeMoney($total, $_POST['account'], $result, $_POST['take']);
            $this->atm();
        }
    }

    public function save()
    {
        $_SESSION['account'] = $_POST['account'];
        $pay = $this->model("Pay");
        $payArray = $pay->takeAccount($_POST['account']);

        $total = $payArray['total'];
        $save = $this->model("Record");

        $result = $total + $_POST['save'];
        $save->saveMoney($total, $_POST['account'], $result, $_POST['save']);
        $this->atm();
    }

    public function detail()
    {
        $detail = $this->model("Record");
        $detaiArray = $detail->selectDetail($_POST['account']);
        $this->view("detailVeiw", $detaiArray);
    }

    public function logout()
    {
        unset($_SESSION);
        $this->view("loginVeiw");
    }
}
