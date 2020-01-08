<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/10/10
 * Time: 上午11:42
 */

namespace Ddup\Part\Message;


use Illuminate\Support\Arr;

class MsgFromArray extends MessageContract
{

    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function get($attr, $def = null)
    {
        return Arr::get($this->container, $attr, $def);
    }

    public function set($attr, $value)
    {
        Arr::set($this->container, $attr, $value);
    }

    public function toArray()
    {
        return $this->container;
    }

}