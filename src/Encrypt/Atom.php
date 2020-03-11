<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2020/3/10
 * Time: 上午8:06
 */

namespace Ddup\Part\Encrypt;


use Ddup\Part\Encrypt\Contracts\EncrypException;

class Atom
{

    private $_atom = [
        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"
    ];

    private $_size;

    function __construct($atom = null)
    {
        if ($atom && is_array($atom)) {
            $this->_atom = $atom;
        }

        $this->_size = count($this->_atom);
    }

    function getSize()
    {
        return $this->_size;
    }

    function aToI($char)
    {
        $index = array_search($char, $this->_atom);

        if ($index === false) {
            throw new EncrypException("不存在的:{$char}");
        }

        return $index;
    }

    function iToA($number)
    {
        if (!isset($this->_atom[$number])) {
            throw new EncrypException("不存在的索引:{$number}");
        }

        return $this->_atom[$number];
    }

    function randUniqueNumber($length, $rangeLength = 0)
    {
        if ($rangeLength == 0) {
            $rangeLength = $this->getSize();
        }

        if ($length > $rangeLength) {
            throw new EncrypException("返回的字典长度不能大于区间");
        }

        if ($this->_size < $rangeLength) {
            throw new EncrypException("字典长度不够");
        }

        $arr     = array_slice($this->_atom, 0, $rangeLength);
        $numbers = [];

        for ($i = 0; $i < $length; $i++) {
            $index = array_rand($arr);

            $numbers[] = $index;

            unset($arr[$index]);
        }

        return $numbers;
    }
}