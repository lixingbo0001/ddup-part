<?php

namespace Ddup\Part\Test\Dumper;


use Ddup\Part\Libs\OutCli;
use Ddup\Part\Libs\OutCliColor;
use Ddup\Part\Test\TestCase;

class OutcliTest extends TestCase
{

    public function test_color()
    {
        OutCli::printLn([
            'name'  => 'blue',
            'color' => '红色'
        ], OutCliColor::red());

        $this->assertTrue(true);
    }
}