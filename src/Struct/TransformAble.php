<?php

namespace Ddup\Part\Struct;

use Illuminate\Support\Collection;

interface TransformAble
{
    function transform(StructReadable &$struct, Collection $data);
}