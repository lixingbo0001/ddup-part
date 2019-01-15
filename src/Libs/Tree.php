<?php namespace Ddup\Part\Libs;


class Tree
{

    public static function path(&$arr, $pid = 0, Array $path = [], $nodeName = '')
    {
        foreach ($arr as &$row) {
            $curPath = $path;
            $curPath[] = $row[$nodeName];

            if ($row['pid'] == $pid) {
                $row['path'] = $curPath;
                self::path($arr, $row['id'], $curPath, $nodeName);
            }
        }
    }

    public static function layer($arr, $pid = 0)
    {
        $result = [];
        foreach ($arr as $row) {
            if ($row['pid'] == $pid) {
                $row['son'] = self::layer($arr, $row['id']);
                $result[] = $row;
            }
        }

        return $result;
    }

    public static function structWithSon($arr, $pid = 0, $idname = 'id', $pidname = 'pid', $level = 0)
    {
        $result = array();
        foreach ($arr as $v) {

            if ($v[$pidname] == $pid) {
                $v['son'] = self::structWithSon($arr, $v[$idname], $idname, $pidname, $level + 1);
                $v['space'] = str_repeat('_', $level * 3);
                $result[] = $v;
            }
        }
        return $result;
    }

    public static function structSort($arr, $pid = 0, $idname = 'id', $pidname = 'pid', $level = 0, $parent = '')
    {
        $result = array();

        foreach ($arr as $v) {
            if ($v[$pidname] == $pid) {

                $v['space'] = str_repeat('---', $level * 3);
                $v['parent'] = $parent;

                $result[] = $v;

                if ($son = self::structSort($arr, $v[$idname], $idname, $pidname, $level + 1, $v['name'])) {
                    $result = array_merge($result, $son);
                }
            }
        }
        return $result;
    }

}


