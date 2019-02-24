<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/16
 * Time: 下午3:37
 */

namespace Ddup\Part\Libs;


use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

class OutCli
{
    public static function printLn($msg, $color = null)
    {
        $msg    = self::formatMessage($msg);
        $dumper = new CliDumper();

        if (!$color) {
            $color = OutCliColor::green();
        }

        $dumper->setStyles([
            'default' => $color,
            'key'     => $color,
            'str'     => $color,
        ]);

        $dumper->dump((new VarCloner())->cloneVar($msg));
    }

    private static function formatMessage($msg)
    {
        if (is_object($msg)) $msg = Helper::toArray($msg);

        return $msg;
    }
}