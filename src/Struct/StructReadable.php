<?php

namespace Ddup\Part\Struct;

use Ddup\Part\Libs\Helper;
use Illuminate\Contracts\Support\Arrayable;

class StructReadable implements Arrayable
{
    private $attrs = [];

    public function __construct($data = [])
    {
        $this->transforData($data);
    }

    private function transforData($original)
    {

        switch (gettype($original)) {
            case 'string':
                $data = json_encode($original, true);
                $this->batchSet($data);
                return;
                break;
            case 'array':
                $this->batchSet($original);
                return;
                break;
        }

        if ($original instanceof StructReadable) {
            $this->batchSet($original->toArray());
            return;
        }

        $propertys = Helper::toArray($original);

        $this->batchSet($propertys);
    }

    private function batchSet($propertys)
    {
        $this->attrs = $propertys;

        foreach ($propertys as $property => $value) {
            $this->set($property, $value);
        }
    }

    private function set($attr, $value)
    {
        if (in_array($attr, $this->attrs())) {
            $this->$attr = $value;
        }
    }

    private function attrs()
    {
        return array_keys(get_object_vars($this));
    }

    public function get($name, $default = null)
    {
        return array_get($this->attrs, $name, $default);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}