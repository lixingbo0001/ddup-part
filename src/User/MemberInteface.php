<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/11
 * Time: 下午5:23
 */

namespace Ddup\Part\User;


interface MemberInteface extends UserInterface
{
    function isMember();
}