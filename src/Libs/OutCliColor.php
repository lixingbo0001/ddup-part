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
    public static function red()
    {
        return '1;31';
    }

    public static function green()
    {
        return '1;32';
    }

    public static function orange()
    {
        return '1;33';
    }

    public static function blue()
    {
        return '1;34';
    }

    public static function purple()
    {
        return '1;35';
    }

    public static function white()
    {
        return '1;37';
    }

}