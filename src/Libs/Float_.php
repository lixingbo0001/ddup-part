<?php namespace Ddup\Part\Libs;


class Float_
{

    private static function format($money)
    {
        $str = strval($money * 100);
        return intval($str);
    }

    public static function reduce($original, $reduce)
    {
        $final = $original - $reduce;

        return self::format($final) / 100;
    }

    public static function add($original, $reduce)
    {
        $final = $original + $reduce;

        return self::format($final) / 100;
    }

    public static function multiply($original, $reduce)
    {
        $final = $original * $reduce;

        return self::format($final) / 100;
    }

    public static function remove($original, $reduce)
    {
        $final = $original / $reduce;

        return self::format($final) / 100;
    }
}
