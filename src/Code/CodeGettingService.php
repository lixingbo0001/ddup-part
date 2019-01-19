<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/9/21
 * Time: 下午2:54
 */

namespace Ddup\Part\Code;

use Ddup\Part\Contracts\CodePoolInteface;

class CodeGettingService
{
    private $pool;

    public function __construct(CodePoolInteface $pool)
    {
        $this->pool = $pool;
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