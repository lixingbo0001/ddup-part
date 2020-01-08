<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/10/10
 * Time: 上午11:42
 */

namespace Ddup\Part\Message;


use Illuminate\Support\Arr;

class MsgFromXml extends MessageContract
{

    private $arr;

    public function __construct($xml)
    {
        $obj = @simplexml_load_string($xml);

        if (!$obj) {
            throw new \Exception('无效的xml内容:' . $xml);
        }

        $this->arr = $this->xmlObjToArray($obj);
    }

    private function xmlObjToArray($obj)
    {
        $result = [];

        foreach ($obj as $child) {

            $result[$child->getName()] = (string)$child;

        }
        return $result;
    }

    public function get($attr, $def = null)
    {
        return Arr::get($this->arr, $attr, $def);
    }

    public function set($attr, $value)
    {
        Arr::set($this->arr, $attr, $value);
    }

    public function toArray()
    {
        return $this->arr;
    }

}