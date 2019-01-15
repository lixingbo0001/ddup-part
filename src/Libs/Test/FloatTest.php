<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/11/19
 * Time: 上午10:18
 */

namespace Ddup\Part\Libs\Test;


use Ddup\Part\Libs\Float_;
use PHPUnit\Framework\TestCase;

class FloatTest extends TestCase
{

    public function test_add()
    {
        $money = 78.46;

        $this->assertEquals(78.47, Float_::add($money, 0.01));
        $this->assertEquals(78.45, Float_::reduce($money, 0.01));
    }
}