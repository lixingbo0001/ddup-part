<?php

namespace Ddup\Part\Test\Provider;


use Ddup\Part\Struct\StructReadable;
use Ddup\Part\Struct\TransformAble;
use Illuminate\Support\Collection;

class UserStructTransform implements TransformAble
{
    function transform(StructReadable &$struct, Collection $data)
    {
        if ($struct instanceof UserOptionProvider) {
            $struct->name = $data->get('mingzi');
            $struct->age  = $data->get('nianling');
            $struct->sex  = $data->get('xingbie');
        }
    }

}
