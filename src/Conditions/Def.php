<?php namespace Ddup\Part\Conditions;

use Ddup\Part\Message\MessageContract;
use Ddup\Part\Contracts\ConditionContract;

class Def implements ConditionContract
{

    public function matched(MessageContract $message, $key, $expect)
    {
        return true;
    }

    public function getName()
    {
        return 'def';
    }
}