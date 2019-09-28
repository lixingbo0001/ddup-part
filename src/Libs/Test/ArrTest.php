<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/11/19
 * Time: 上午10:18
 */

namespace Ddup\Part\Libs\Test;


use Ddup\Part\Libs\Arr;
use Ddup\Part\Libs\Unit;
use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{

    public function test_group()
    {
        $list = [
            [
                'way' => 'fuyou',
            ],
            [
                'way' => 'upay'
            ]
        ];

        $this->assertEquals([
            'fuyou' => [
                'way' => 'fuyou',
            ],
            'upay'  => [
                'way' => 'upay'
            ]
        ], Arr::group($list, 'way', false));
    }

    public function test_groupMulti()
    {
        $list = [
            [
                'way' => 'fuyou',
            ],
            [
                'way' => 'upay'
            ]
        ];

        $this->assertEquals([
            'fuyou' => [
                [
                    'way' => 'fuyou',
                ]
            ],
            'upay'  => [
                [
                    'way' => 'upay'
                ]
            ]
        ], Arr::group($list, 'way'));
    }
}