<?php

namespace Ddup\Part\Test\Provider;


use Ddup\Part\User\MemberInteface;
use Ddup\Part\User\UserAbstraict;

class MemberMook extends UserAbstraict implements MemberInteface
{
    private static $self;

    function isMember()
    {
        return true;
    }

    function getId()
    {
        return $this->getAttribute('id');
    }

    function setId($id)
    {
        $this->setAttribute('id', $id);
    }

    function getName()
    {
        return $this->getAttribute('name');
    }

    static function getInstance($is_mook = false)
    {
        if (!(self::$self instanceof self)) {
            self::$self = new self;
        }

        return self::$self;
    }
}