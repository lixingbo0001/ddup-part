<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/16
 * Time: 上午11:34
 */

namespace Ddup\Part\Test\Provider;


use Ddup\Part\Request\HasHttpRequest;

trait MyClient
{
    use HasHttpRequest;

    public function requestOptions()
    {
        return [];
    }

    public function requestParams()
    {
        return [
            'account' => 'blue'
        ];
    }

    public function getBaseUri()
    {
        return 'http://localhost:8000';
    }
}