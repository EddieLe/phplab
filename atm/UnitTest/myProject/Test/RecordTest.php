<?php
namespace myProject\Test;

require_once "MyPDO.php";
use myProject\Record;

class RecordTest extends \PHPUnit_Framework_TestCase {

    public function testTakeMoney() {
        $total = 10000;
        $account = 99999;
        $take = 1000;
        $expectedResult = 9000;

        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;

        $record = new Record();
        $result = $record->takeMoney($total, $account, $take);
        $this->assertEquals($expectedResult, $result);
    }

}