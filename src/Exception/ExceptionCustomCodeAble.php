<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2018/7/4
 * Time: 上午10:38
 */

namespace Ddup\Part\Exception;


class ExceptionCustomCodeAble extends \Exception
{
    public  $row;
    private $customCode;

    public function __construct(string $message = "", $code = "", $row = [])
    {
        $this->row        = $row;
        $this->customCode = $code === "" ? 'fail' : $code;
        parent::__construct($message, intval($code));
    }

    public function getCustomCode()
    {
        return $this->customCode;
    }

    public function getRow()
    {
        return $this->row;
    }
}