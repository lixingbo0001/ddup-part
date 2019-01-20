<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/10/9
 * Time: 下午3:30
 */

namespace Ddup\Part\Message;

trait AttributeAble
{
    protected $attributes = [];

    public function attributes()
    {
        return $this->attributes;
    }

    public function getAttribute($name, $default = null)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : $default;
    }

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    public function merge(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->attributes);
    }

    public function offsetGet($offset)
    {
        return $this->getAttribute($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->setAttribute($offset, $value);
    }

    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }

    public function toArray()
    {
        return $this->attributes();
    }
}