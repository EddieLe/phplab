<?php
require_once "myProject/Record.php";

class RecordTest extends \PHPUnit_Framework_TestCase
{
    //for model 測試
    public function testTakeMoney()
    {
        $total = 13000;
        $account = 99999;
        $take = 1000;
        $expectedResult = true;

        $record = new Record();
        $result = $record->takeMoney($total, $account, $take);
        $this->assertEquals($expectedResult, $result);

        $total = 13000;
        $account = 9999;
        $take = 1000;
        $expectedResult = false;
        $result = $record->takeMoney($total, $account, $take);
        $this->assertEquals($expectedResult, $result);
    }

    public function testSelectDetail()
    {
        $account = 99999;
        $expectedResult = true;

        $record = new Record();
        $result = $record->selectDetail($account);
        $this->assertEquals($expectedResult, $result);
    }

    public function testSaveMoney()
    {
        $total = 13000;
        $account = 99999;
        $save = 1000;
        $expectedResult = true;

        $record = new Record();
        $result = $record->saveMoney($total, $account, $result, $save);
        $this->assertEquals($expectedResult, $result);
    }

}
