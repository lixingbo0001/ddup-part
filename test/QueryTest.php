<?php

namespace Ddup\Part\Test;

use Ddup\Part\Request\Query;

class QueryTest extends TestCase
{

    public function test_getString()
    {
        $query = new Query("http://activity.513yun.com/dist?code=33/#fail", [], false);

        $query->pushQuery([
            "id"   => 1,
            "name" => "blue"
        ]);

        $str = $query->getString();

        dump($str);

        $this->assertTrue(true);
    }

}