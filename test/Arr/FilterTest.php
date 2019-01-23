<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/23
 * Time: 下午5:03
 */

namespace Ddup\Part\Test\Arr;

use Ddup\Part\Libs\Arr;
use Ddup\Part\Test\TestCase;

class FilterTest extends TestCase
{

    function test_index()
    {
        $arr = [
            'blue_name' => 'blue',
            'blue_age'  => 10,
            'name'      => 'blue',
            'age'       => 20
        ];

        $this->assertArrayHasKey('blue_name', $arr);

        Arr::filterCallback($arr, function ($k) {
            return strstr($k, 'blue');
        });

        $this->assertArrayNotHasKey('blue_name', $arr);
    }
}