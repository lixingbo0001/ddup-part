<?php namespace Ddup\Part\Libs;


Class Time
{

    private static $path  = null;
    private static $start = [];

    static function dayToSecond($d)
    {
        return $d * 86400;
    }

    static function date($time = null, $format = 'Y-m-d H:i:s')
    {
        return $time !== null ? date($format, $time) : date($format);
    }

    static function formatReset($format, $date)
    {
        return self::date(strtotime($date), $format);
    }

    static function dateAfter($d)
    {
        return self::date(strtotime('+' . $d . ' day'));
    }

    static function dateBefore($d)
    {
        return self::date(strtotime('-' . $d . ' day'));
    }

    static public function start($path = null)
    {
        if (is_null($path)) {
            $path = time() . mt_rand(0, 10000000);
        }
        self::$path         = $path;
        self::$start[$path] = microtime(true);
    }

    static public function end($path = null)
    {
        if (is_null($path)) {
            $path = self::$path;
        }

        $t = microtime(true) - self::$start[$path];
        $t = $t * 1000000;
        return round($t) / 1000000;
    }
}