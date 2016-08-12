<?php
require_once "myProject/Record.php";

class RecordTest extends \PHPUnit_Framework_TestCase {
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
    }

}