<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/9/21
 * Time: 下午2:54
 */

namespace Ddup\Part\Code;

class CodeGettingService
{
    private $pool;

    public function __construct($name)
    {
        $this->pool = new CodePool($name);
    }

    public function pop()
    {
        return $this->pool->pop();
    }

    public function isEmpty()
    {
        return $this->stock() <= 0;
    }

    public function stock()
    {
        return $this->pool->count();
    }
}