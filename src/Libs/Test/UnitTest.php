<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/11/19
 * Time: 上午10:18
 */

namespace Ddup\Part\Libs\Test;


use Ddup\Part\Libs\Unit;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{

    public function test_yunToFen()
    {
        $money = 78.46;

        $this->assertEquals(7845, intval($money * 100));
        $this->assertEquals(7846, Unit::yuntoFen($money));
    }
}