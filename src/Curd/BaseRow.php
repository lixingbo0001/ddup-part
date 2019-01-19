<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/10/14
 * Time: 上午11:50
 */

namespace Ddup\Part\Curd;


use Ddup\Part\Contracts\RowContainerInterface;
use Ddup\Part\Libs\Helper;
use Ddup\Part\Single\SingleAble;

abstract class  BaseRow implements RowContainerInterface
{
    use SingleAble, CurdServiceTrait;

    public function __get($name)
    {
        return $this->getRow()->$name;
    }

    public function attr($name)
    {
        return $this->getRow()->$name;
    }

    public function toArray()
    {
        return Helper::toArray($this->getRow());
    }
}