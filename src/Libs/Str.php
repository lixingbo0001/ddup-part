<?php namespace Ddup\Part\Libs;


Class Str
{

    static private function split($str, $delimiter)
    {
        return explode($delimiter, $str);
    }

    static public function first($str, $delimiter)
    {
        return Arr::first(self::split($str, $delimiter));
    }

    static public function last($str, $delimiter)
    {
        return Arr::last(self::split($str, $delimiter));
    }

    static public function rand($len, $atom = [])
    {
        return join('', Arr::rand($len, $atom));
    }

    static public function lcfist($str)
    {
        return strtolower(substr($str, 0, 1)) . substr($str, 1);
    }

    static public function counts($haystack, $needles)
    {
        $list = [];
        foreach ($needles as $k => $needle) {
            $count  = substr_count($haystack, $needle);
            $index  = $count == 0 ? 0 : strpos($haystack, $needle);
            $list[] = ['keyword' => $needle, 'index' => $index, 'count' => $count];
        }
        return $list;
    }

    static public function replace($str, Array $params, $leftLimit = '{', $rightLimit = '}')
    {
        foreach ($params as $k => $v) {
            $str = str_replace("{$leftLimit}$k{$rightLimit}", $v, $str);
        }
        return $str;
    }

    static public function replaceOfIndex($str, $leftLen, $rightLen)
    {
        if ($leftLen + $rightLen > strlen($str)) {
            return $str;
        }

        return substr($str, $leftLen) . '***' . substr($str, -$rightLen);
    }
}