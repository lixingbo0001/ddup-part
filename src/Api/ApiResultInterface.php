<?php namespace Ddup\Part\Api;

use Illuminate\Support\Collection;

interface ApiResultInterface
{
    function isSuccess();

    function getCode();

    function getMsg();

    function getData():Collection;
}
