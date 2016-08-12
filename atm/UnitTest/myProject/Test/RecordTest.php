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

        $this->assertEquals("109", $result[0]['id']);
        $this->assertEquals("21000", $result[0]['total']);
        $this->assertEquals("0", $result[0]['take']);
        $this->assertEquals("1000", $result[0]['save']);
        $this->assertEquals("22000", $result[0]['result']);
        $this->assertEquals("2016-08-11 01:47:46", $result[0]['date']);
        $this->assertEquals("99999", $result[0]['account']);

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
