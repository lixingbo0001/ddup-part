<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/10/10
 * Time: 上午11:42
 */

namespace Ddup\Part\Message;


class MsgToXml
{

    private $message;
    private $xml;

    public function __construct(MessageContract $message)
    {
        $this->message = $message;
        $this->xml     = new \XMLWriter();
    }

    function toXml($data)
    {
        $this->xml->openMemory();


        $this->write($data);

        return $this->xml->outputMemory(true);
    }

    function write($data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $this->xml->startElement($key);
                $this->write($value);
                $this->xml->endElement();
            } else {
                $this->xml->writeElement($key, $value);
            }
        }
    }

    public function __toString()
    {
        return $this->toString();
    }

    public function toString()
    {
        return $this->toXml($this->message->toArray());
    }
}