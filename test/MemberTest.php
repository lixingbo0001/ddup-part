<?php

namespace Ddup\Part\Test;


use Ddup\Part\Libs\OutCli;
use Ddup\Part\Test\Provider\MemberMook;

class MemberTest extends TestCase
{

    public function test_Attr()
    {
        MemberMook::getInstance()->init([
            'id'   => 1,
            'name' => 'blue'
        ]);

        $member = MemberMook::getInstance();

        $this->assertEquals(1, $member->getId());

        $this->assertEquals('blue', MemberMook::getInstance()->getName());

        $this->assertEquals(1, MemberMook::getInstance()->getId());
    }
}