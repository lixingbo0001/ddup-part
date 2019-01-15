<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/11/19
 * Time: 上午10:18
 */

namespace Ddup\Part\Libs\Test;


use Ddup\Part\Libs\Time;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{

    public function test_daytosecond()
    {
        $d = 1;

        $second = \time() + Time::dayToSecond($d);

        $this->assertEquals(Time::dateAfter($d), Time::date($second));
    }
}