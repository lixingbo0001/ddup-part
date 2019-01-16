<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/16
 * Time: 下午3:37
 */

namespace Ddup\Part\Libs;


class OutCli
{
    public static function printLn($msg)
    {
        $msg      = self::formatMessage($msg);
        $colorMsg = self::withColor($msg);

        echo "\n" . $colorMsg;
    }

    private static function withColor($msg)
    {
        return "\033[" . OutCliColor::red() . "m" . $msg . "\033[0m";
    }

    private static function formatMessage($msg)
    {
        if (is_array($msg) || is_object($msg)) return json_encode(Helper::toArray($msg), JSON_UNESCAPED_UNICODE);

        return $msg;
    }
}