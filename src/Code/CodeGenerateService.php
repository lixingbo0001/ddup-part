<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/9/21
 * Time: 下午2:54
 */

namespace Ddup\Part\Code;


use Ddup\Part\Libs\Str;

class CodeGenerateService
{

    private $pool;

    public function __construct($name)
    {
        $this->pool = new CodePool($name);
    }

    private function numberRandom($len)
    {
        return Str::rand($len, [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]);
    }

    public function number($add_number, $str_len)
    {
        $stock = $this->pool->count();
        $total = $stock + $add_number;

        for ($i = 0; $i < $add_number; $i++) {
            $code = $this->numberRandom($str_len);

            $this->pool->push($code);
        }

        $stock = $this->pool->count();
        $miss  = $total - $stock;

        if ($miss > 0) {
            $this->number($miss, $str_len);
        }
    }
}