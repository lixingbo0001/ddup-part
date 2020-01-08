<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/11/19
 * Time: 上午10:18
 */

namespace Ddup\Part\Libs\Test;


use Ddup\Part\Libs\OutCli;
use PHPUnit\Framework\TestCase;

class OutcliTest extends TestCase
{

    public function test_printLn()
    {
        OutCli::printLn([
            'topic' => 'blue',
            'data'  => [
                'msg'     => '没毛病',
                'context' => ['name' => 'green']
            ]
        ]);

        $this->assertTrue(true);
    }
}