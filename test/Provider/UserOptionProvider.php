<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/12/21
 * Time: 下午8:01
 */

namespace Ddup\Part\Test\Provider;


use Ddup\Part\Struct\StructReadable;

class UserOptionProvider extends StructReadable
{
    public $name;
    public $age;
    public $sex = 0;
    public $hobby;
}