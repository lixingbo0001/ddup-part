<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/11
 * Time: 下午5:23
 */

namespace Ddup\Part\User;


interface UserInterface
{
    function getId();

    function setId($id);

    function init($user);

    function getName();

    function model();

    function getAttribute($name, $default = null);

    static function getInstance($is_mook = false);
}