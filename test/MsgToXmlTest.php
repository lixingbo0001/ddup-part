<?php

namespace Ddup\Part\Test;


use Ddup\Part\Libs\OutCli;
use Ddup\Part\Message\MsgFromArray;
use Ddup\Part\Message\MsgToXml;

class MsgToXmlTest extends TestCase
{

    public function test_arrToXml()
    {
        $order = [
            'amount'   => 10.00,
            'order_no' => '201823499283853883383',
            'goods'    => [
                'name'  => '项链',
                'price' => 10
            ]
        ];

        $xml = new MsgToXml(new MsgFromArray($order));

        $this->assertEquals('<amount>10</amount><order_no>201823499283853883383</order_no><goods><name>项链</name><price>10</price></goods>',
            $xml . ''
        );
    }

}