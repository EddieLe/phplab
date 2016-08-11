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

                $take = $this->model("Record");
                $result = $total - $_POST['take'];

                return "可提款";
                if ($result < 0) {
                    $error = $this->model("Session");
                    $error->sessionErrorAction("error");

                    $account = $pay->takeAccount($_SESSION['account']);
                    $this->view("atmView", $account);

                    return "餘額不足";
                } else {
                    $take->takeMoney($total, $_POST['account'], $result, $_POST['take']);

                    return "提款";
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

                return "可存款";
            } else {
                return "不可存款";
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
