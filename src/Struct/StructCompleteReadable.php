<?php

namespace Ddup\Part\Struct;


class StructCompleteReadable extends StructReadable
{
    protected function set($attr, $value)
    {
        $this->$attr        = $value;
        $this->attrs[$attr] = $value;
    }

    protected function values()
    {
        return $this->attrs;
    }

    public function get($name, $default = null)
    {
        return array_get($this->attrs, $name, $default);
    }

    public function toArray()
    {
        return $this->values();
    }
}