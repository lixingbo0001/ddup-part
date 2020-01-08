<?php namespace Ddup\Part\Libs;

use \Illuminate\Support\Arr;

class Url
{

    public static function query($url, $params = [])
    {
        $request = parse_url($url);
        $scheme  = Arr::get($request, 'scheme');
        $host    = Arr::get($request, 'host');
        $path    = Arr::get($request, 'path');
        $query   = Arr::get($request, 'query', '');

        parse_str($query, $query_arr);

        $query_arr = array_merge($query_arr, $params);
        $uri       = $scheme . '://' . $host . $path;

        return $query_arr ? ($uri . '?' . http_build_query($query_arr)) : $uri;
    }
}

