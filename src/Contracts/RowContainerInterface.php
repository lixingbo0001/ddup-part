<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/10/15
 * Time: 下午5:58
 */

namespace Ddup\Part\Contracts;


use Illuminate\Contracts\Support\Arrayable;

interface RowContainerInterface extends Arrayable
{
    function attr($name);

    function getRow();

    function toArray();
}