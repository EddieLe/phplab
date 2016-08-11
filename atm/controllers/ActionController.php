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

        //提款動作
        if (isset($_POST['take'])) {
            if ($_POST['take'] > 0) {
                $payArray = $pay->takeAccount($_POST['account']);
                $total = $payArray['total'];
                $version = $payArray['version'];

                $take = $this->model("Record");
                $result = $total - $_POST['take'];

                if ($result < 0) {
                    $error = $this->model("Session");
                    $error->sessionErrorAction("error");

                    $account = $pay->takeAccount($_SESSION['account']);
                    $this->view("atmView", $account);
                } else {
                    $take->takeMoney($version, $_POST['account'], $_POST['take']);
                }
            }

        //存款動作
        } elseif (isset($_POST['save'])) {
            if ($_POST['save'] > 0) {
                $payArray = $pay->takeAccount($_POST['account']);
                $total = $payArray['total'];

                $save = $this->model("Record");
                $result = $total + $_POST['save'];
                $save->saveMoney($total, $_POST['account'], $result, $_POST['save']);
            }

        }
        $account = $pay->takeAccount($_SESSION['account']);
        $this->view("atmView", $account);
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
