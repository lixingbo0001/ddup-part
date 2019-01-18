<?php namespace Ddup\Part\Conditions;


use Ddup\Part\Message\MessageContract;
use Ddup\Part\Conditions\Contracts\ConditionContract;

class Less implements ConditionContract
{
    function matched(MessageContract $message, $key, $expect)
    {
        $xmlAttrValue = $message->get($key);

        if ($xmlAttrValue === null) {
            return false;
        }

        return $xmlAttrValue < $expect;
    }

    function getName()
    {
        return 'less_than';
    }

}