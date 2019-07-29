<?php namespace Ddup\Part\Conditions;

use Ddup\Part\Message\MessageContract;
use Ddup\Part\Contracts\ConditionContract;

class NotEqual implements ConditionContract
{

    public function matched(MessageContract $message, $key, $expect)
    {
        $xmlAttrValue = $message->get($key);

        return $xmlAttrValue !== $expect;
    }

    public function getName()
    {
        return 'equal';
    }

}