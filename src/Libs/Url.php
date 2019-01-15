<?php namespace Ddup\Part\Libs;


class Url
{

    public static function query($url, $params = [])
    {
        $request = parse_url($url);
        $scheme  = array_get($request, 'scheme');
        $host    = array_get($request, 'host');
        $path    = array_get($request, 'path');
        $query   = array_get($request, 'query', '');

        parse_str($query, $query_arr);

        $query_arr = array_merge($query_arr, $params);
        $uri       = $scheme . '://' . $host . $path;

        return $query_arr ? ($uri . '?' . http_build_query($query_arr)) : $uri;
    }
}

