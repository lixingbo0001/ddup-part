<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/12/21
 * Time: 下午8:01
 */

namespace Ddup\Part\Test\Provider;


use Ddup\Part\Contracts\CodePoolInteface;

class CodePoolProvider implements CodePoolInteface
{
    private $name = 'coupon_code_222';

    private function file()
    {
        return __DIR__ . '/data/' . $this->name;
    }

    private function content()
    {
        return file_get_contents($this->file());
    }

    private function data()
    {
        return json_decode($this->content(), true) ?: [];
    }

    private function write($data)
    {
        return file_put_contents($this->file(), json_encode($data));
    }

    function pop()
    {
        $data = $this->data();

        $pop = array_pop($data);

        $this->write($data);

        return $pop;
    }

    function push($code)
    {
        $data   = $this->data();
        $data[] = $code;

        return $this->write($data);
    }

    function count()
    {
        return sizeof($this->data());
    }

}