<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/2/28
 * Time: 下午7:48
 */

namespace Ddup\Part\Request;


class Query
{
    private $_query;
    private $_path;

    public function __construct($url, array $more_query = [])
    {
        $this->parse($url);
        $this->pushQuery($more_query);
    }

    private function parse($url)
    {
        $arr       = explode('?', $url);
        $path      = array_get($arr, 0, '');
        $query_str = array_get($arr, 1, '');

        parse_str($query_str, $query);

        $this->_path  = $path;
        $this->_query = $query;
    }

    public function getString()
    {
        $url = $this->_path;

        if ($this->_query) {
            $url = $url . '?' . http_build_query($this->_query);
        }

        return $url;
    }

    public function __toString()
    {
        return $this->getString();
    }

    public function pushQuery(array $query)
    {
        $this->_query = array_merge($this->_query, $query);
    }
}