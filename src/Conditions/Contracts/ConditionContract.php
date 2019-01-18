<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/10/9
 * Time: 下午4:15
 */

namespace Ddup\Part\Conditions\Contracts;

use Ddup\Part\Message\MessageContract;

interface ConditionContract
{
    function matched(MessageContract $message, $key, $expect);

    function getName();
}
