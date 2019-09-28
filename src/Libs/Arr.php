<?php namespace Ddup\Part\Libs;


Class Arr
{

    static public function filter($arr, Array $vals = [], $type = false)
    {
        return array_filter($arr, function ($v) use ($vals, $type) {
            return !in_array($v, $vals, $type);
        });
    }

    static public function format($arr, $callable, $method = null)
    {
        if ($method) {
            return array_map(function ($v) use ($callable, $method) {
                return $callable->$method($v);
            }, $arr);
        }

        return array_map(function ($v) use ($callable) {
            return $callable($v);
        }, $arr);
    }

    static public function searchAll($arr, $name, $search)
    {
        $list = [];
        foreach ($arr as $value) {
            if ($value[$name] == $search) $list[] = $value;
        }
        return $list;
    }

    static public function rand($len, $atom = [])
    {
        if (!$atom) $atom = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

        $tmp = [];
        while (count($tmp) < $len) {
            shuffle($atom);
            $tmp = array_merge($tmp, array_slice($atom, 0, $len - count($tmp)));
        }

        return $tmp;
    }

    static public function first($arr)
    {
        return is_array($arr) ? array_shift($arr) : null;
    }

    static public function last($arr)
    {
        return is_array($arr) ? end($arr) : null;
    }

    static public function paved($arr, $keyPreFix = '')
    {
        $result = [];
        foreach ($arr as $k => $v) {
            $curKey = $keyPreFix . $k;

            if (is_array($v)) {
                $result = array_merge($result, self::paved($v, $curKey . '.'));
            } else {
                $result[$curKey] = $v;
            }
        }
        return $result;
    }

    static public function unPaved($paved)
    {
        $result = [];
        foreach ($paved as $k => $v) {
            $keys   = explode('.', $k);
            $row    = self::parse($keys, [], $v);
            $result = array_merge_recursive($result, $row);
        }
        return $result;
    }

    static public function parse($keys, $row, $val)
    {
        $firstKey = array_shift($keys);

        if ($keys) {
            $row[$firstKey] = self::parse($keys, $row, $val);
        } else {
            $row[$firstKey] = $val;
        }
        return $row;
    }

    static public function enum($val, $arr)
    {
        if (in_array($val, $arr)) return $val;
        return $arr[0];
    }

    static public function reduceMerge($arr)
    {
        $result = [];

        foreach ($arr as $k => $v) {
            if (!is_array($v)) {
                $result[$k] = $v;
            } else {
                $result = array_merge($result, self::reduceMerge($v));
            }
        }

        return $result;
    }

    static public function getIfExists(Array $arr, array $definds)
    {
        $result = [];
        foreach ($definds as $name) {
            if (isset($arr[$name])) {
                $result[$name] = $arr[$name];
            }
        }
        return $result;
    }

    static public function find($list, $value, $key = 'id')
    {
        foreach ($list as $v) {
            if ($v[$key] == $value) {
                return $v;
            }
        }
        return [];
    }

    static public function findIndex($list, $value, $key = 'id')
    {
        foreach ($list as $k => $v) {
            if ($v[$key] == $value) {
                return $k;
            }
        }
        return null;
    }

    static public function findAll($list, $value, $key = 'id')
    {
        $result = [];

        foreach ($list as $v) {
            if ($v[$key] == $value) {
                $result[] = $v;
            }
        }
        return $result;
    }

    static public function pullAll(&$list, $value, $key = 'id')
    {
        $result = [];

        foreach ($list as $k => $v) {

            if (!isset($v[$key])) continue;

            if ($v[$key] == $value) {
                $result[] = array_pull($list, $k);
            }
        }
        return $result;
    }

    static public function min($arr, $field)
    {
        if (!$arr) return [];

        $min       = array_shift($arr);
        $min_value = $min[$field];

        foreach ($arr as $item) {
            if ($item[$field] < $min_value) {
                $min       = $item;
                $min_value = $item[$field];
            }
        }

        return $min;
    }

    static function filterCallback(&$arr, $callback)
    {
        foreach ($arr as $key => $value) {
            if ($callback($key, $value)) {
                array_forget($arr, $key);
            }
        }
    }

    static function group($arr, $k, $is_multi = true)
    {
        $result = [];

        foreach ($arr as $row) {
            if ($is_multi) {
                $result[$row[$k]][] = $row;
            } else {
                $result[$row[$k]] = $row;
            }
        }

        return $result;
    }

    static function firstInString($keywords, $str)
    {
        $whitelist = "/" . implode("|", $keywords) . "/i";

        if (preg_match($whitelist, $str, $matches)) {
            return $matches[0];
        }

        return null;
    }
}



