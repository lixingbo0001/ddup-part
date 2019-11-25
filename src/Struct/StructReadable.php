<?php

namespace Ddup\Part\Struct;

use Ddup\Part\Libs\Helper;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class StructReadable implements Arrayable
{
    protected $attrs = [];

    public function __construct($data = [], TransformAble $transformer = null)
    {
        $fomated = $this->format($data);

        $this->batchSet($fomated);

        if ($transformer) {
            $transformer->transform($this, new Collection($fomated));
        }
    }

    protected function format($original)
    {

        switch (gettype($original)) {
            case 'string':
                return (array)json_encode($original, true);
            case 'array':
                return $original;
        }

        if ($original instanceof StructReadable) {
            return $original->toArray();
        }

        return Helper::toArray($original);
    }

    protected function batchSet($propertys)
    {
        $this->attrs = $propertys;

        foreach ($propertys as $property => $value) {
            $this->set($property, $value);
        }
    }

    protected function set($attr, $value)
    {
        if (in_array($attr, $this->propertys())) {
            $this->$attr = $value;
        }
    }

    protected function propertys()
    {
        return array_keys($this->values());
    }

    protected function values()
    {
        $attrs = get_object_vars($this);

        array_forget($attrs, ['attrs']);

        return $attrs;
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