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
        if (in_array($attr, $this->propertys())) {
            $this->$attr = $value;
        }
    }

    private function propertys()
    {
        return array_keys($this->values());
    }

    private function values()
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