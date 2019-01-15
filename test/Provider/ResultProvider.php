<?php

namespace Ddup\Part\Test\Provider;


use Ddup\Part\Api\ApiResultInterface;
use Illuminate\Support\Collection;

class ResultProvider implements ApiResultInterface
{

    private $_result;

    public function __construct($ret)
    {
        if (is_string($ret)) $ret = json_decode($ret, true);

        $this->_result = new Collection($ret);
    }

    public function isSuccess()
    {
        return $this->getCode() == 'success';
    }

    public function getCode()
    {
        return $this->_result->get('retcode');
    }

    public function getData():Collection
    {
        return new Collection($this->_result->get('server'));
    }

    public function getMsg()
    {
        return '没戏';
    }


}