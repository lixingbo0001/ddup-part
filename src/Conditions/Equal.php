<?php namespace Ddup\Part\Conditions;

use Ddup\Part\Message\MessageContract;
use Ddup\Part\Contracts\ConditionContract;

class Equal implements ConditionContract
{

    public function matched(MessageContract $message, $key, $expect)
    {
        $xmlAttrValue = $message->get($key);

        if ($xmlAttrValue === null) {
            return false;
        }

        return $xmlAttrValue == $expect;
    }

    public function getName()
    {
        return 'equal';
    }

}