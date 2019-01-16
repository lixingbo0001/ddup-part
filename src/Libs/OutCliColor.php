<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/16
 * Time: 下午3:37
 */

namespace Ddup\Part\Libs;


class OutCliColor
{
    public static function green()
    {
        return '1;32';
    }

    public static function red()
    {
        return '1;31';
    }
}