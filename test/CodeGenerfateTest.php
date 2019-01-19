<?php

namespace Ddup\Part\Test;


use Ddup\Part\Code\CodeGenerateService;
use Ddup\Part\Code\CodeGettingService;
use PHPUnit\Framework\TestCase;

class CodeGenerfateTest extends TestCase
{

    public function testGeernate()
    {
        $name          = 'coupon_code_222';
        $code_genarate = new CodeGenerateService($name);
        $code_getting  = new CodeGettingService($name);

        $code_genarate->number(10, 12);

        $this->assertFalse($code_getting->isEmpty());

    }

    public function testStock()
    {
        $name = 'coupon_code_222';

        $code_getting = new CodeGettingService($name);

        $stock = $code_getting->stock();

        while ($code_getting->pop()) {
            true;
        }

        $this->assertEquals($stock, 10);
    }

}