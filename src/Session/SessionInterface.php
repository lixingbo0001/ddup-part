<?php

namespace Ddup\Part\Session;


interface SessionInterface
{
    function set($name, $value);

    function get($name, $default = null);

    function value($value = null);
}