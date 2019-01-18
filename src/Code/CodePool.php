<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/9/21
 * Time: 下午3:02
 */

namespace Ddup\Part\Code;


use Ddup\Part\Contracts\CodePoolInteface;
use Illuminate\Support\Facades\Redis;

class CodePool implements CodePoolInteface
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function pop()
    {
        return Redis::spop($this->name);
    }

    public function count()
    {
        return Redis::scard($this->name);
    }

    public function push($code)
    {
        return Redis::sadd($this->name, $code);
    }
}