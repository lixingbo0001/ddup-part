<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/10/9
 * Time: 下午3:30
 */

namespace Ddup\Part\Message;

use Illuminate\Contracts\Support\Arrayable;

abstract class MessageContract implements Arrayable
{

    abstract function get($attr, $def = null);

    abstract function set($attr, $value);

    public function merge(MessageContract $message)
    {
        $attrs = $message->toArray();

        foreach ($attrs as $name => $attr) {

            $this->set($name, $attr);
        }
    }

    function __get($name)
    {
        return $this->get($name);
    }

}