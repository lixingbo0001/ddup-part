<?php namespace Ddup\Part\Api;

interface ApiResultInterface
{
    function isSuccess();

    function getCode();

    function getMsg();

    /**
     * @return  \Illuminate\Support\Collection
     */
    function getData();
}
