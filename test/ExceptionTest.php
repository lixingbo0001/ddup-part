<?php

namespace Ddup\Part\Test;

use Ddup\Part\Exception\ExceptionCustomCodeAble;
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{

    public function test_message()
    {
        try {
            throw new ExceptionCustomCodeAble('自定义code');
        } catch (\Exception $exception) {
            $this->assertEquals('自定义code', $exception->getMessage());
        }
    }

}