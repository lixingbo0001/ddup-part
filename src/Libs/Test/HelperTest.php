<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/14
 * Time: 上午11:57
 */

namespace Ddup\Part\Libs\Test;


use Ddup\Part\Libs\Helper;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{

    public function test_toArray()
    {
        $arr = ['name' => 'blue', 'age' => 19];

        $collection = new Collection($arr);

        $this->assertEquals($arr, Helper::toArray($arr));
        $this->assertEquals($arr, Helper::toArray($collection));
    }
}