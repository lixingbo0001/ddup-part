<?php

namespace Ddup\Part\Test;


use Ddup\Part\Code\CodeGenerateService;
use Ddup\Part\Code\CodeGettingService;
use Ddup\Part\Test\Provider\CodePoolProvider;
use PHPUnit\Framework\TestCase;

class CodeGenerfateTest extends TestCase
{

    public function testGeernate()
    {
        $pool          = new CodePoolProvider();
        $code_genarate = new CodeGenerateService($pool);
        $code_getting  = new CodeGettingService($pool);

        $code_genarate->number(10, 12);

        $this->assertFalse($code_getting->isEmpty());

    }

    public function testStock()
    {
        $pool         = new CodePoolProvider();
        $code_getting = new CodeGettingService($pool);

        $stock = $code_getting->stock();

        while ($code_getting->pop()) {
            true;
        }

        $this->assertEquals($stock, 10);
    }

}