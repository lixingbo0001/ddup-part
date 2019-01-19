<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/12/21
 * Time: 下午8:01
 */

namespace Ddup\Part\Test\Provider;


use Ddup\Part\Libs\OutCli;
use Ddup\Part\Libs\OutCliColor;
use Psr\Log\LoggerInterface;

class LoggerProvider implements LoggerInterface
{
    public function emergency($message, array $context = array())
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log(__FUNCTION__, $message, $context);
    }

    public function log($level, $message, array $context = array())
    {
        OutCli::printLn(compact('message', 'context'), OutCliColor::green());
    }

}