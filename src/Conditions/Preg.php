<?php namespace Ddup\Part\Conditions;


use Ddup\Part\Message\MessageContract;
use Ddup\Part\Contracts\ConditionContract;

class Preg implements ConditionContract
{
    function matched(MessageContract $message, $key, $expect)
    {
        $xmlAttrValue = $message->get($key);

        if ($xmlAttrValue === null) {
            return false;
        }

        return preg_match($expect, $xmlAttrValue);
    }

    function getName()
    {
        return 'reg_exp';
    }

}