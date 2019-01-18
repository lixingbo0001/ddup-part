<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/9/21
 * Time: 下午2:59
 */

namespace Ddup\Part\Contracts;


interface CodePoolInteface
{
    function pop();

    function push($code);

    function count();
}