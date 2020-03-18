<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2020/3/9
 * Time: 下午6:18
 */

namespace Ddup\Part\Encrypt;


use Ddup\Part\Libs\Arr;

class EncryptDdup
{
    private $_maxSize = 11;

    /**
     * encode传入的标识
     * @var string
     */
    private $_sign;
    private $_atom;

    public function __construct($atom = null)
    {
        $this->_atom    = new Atom($atom);
        $this->_maxSize = $this->_atom->getSize();
    }


    //1. 加密过程
    //拿到token，和要排列的$sign
    //预生成比$sign长度大10的arr
    //随机获取每个$sign字符的位置position
    //将arr对应位置替换成$sign字符
    //得到新的字符串token.填充.位置.填充长度.$sign长度
    function encode($hash, $sign)
    {
        //预生成比str长度大20的arr
        $length     = strlen($sign);
        $fillLength = min($length + 20, $this->_maxSize);
        $arr        = Arr::rand($fillLength);
        $positions  = [];

        //随机获取每个str字符的位置position
        $indexs = $this->_atom->randUniqueNumber($length, $fillLength);

        foreach ($indexs as $i => $index) {
            $arr[$index] = $sign[$i];
            $positions[] = $this->_atom->iToA($index);
        }

        //得到新的字符串token.填充.位置.填充长度.str长度
        return $hash . join($arr) . join($positions) . $this->_atom->iToA($fillLength - 1) . $this->_atom->iToA($length - 1);
    }


    //2.解密过程
    //拿到token
    //拿到两个长度值
    //根据两个长度拿到:position信息/填充信息
    //分离出真实token
    //根据position拿到所有单字符组合成key
    //返回真实token和key
    function decode($token)
    {
        $strLength  = $this->_atom->aToI($token[-1]) + 1;
        $fillLength = $this->_atom->aToI($token[-2]) + 1;
        $sign       = '';

        //去掉最后两个长度标识
        $token = substr($token, 0, -2);

        //拿到位置信息
        $position = substr($token, -$strLength);
        //去掉位置信息
        $token = substr($token, 0, -$strLength);

        //拿到填充信息
        $fill = substr($token, -$fillLength);
        //去掉填充
        $hash = substr($token, 0, -$fillLength);

        for ($i = 0; $i < strlen($position); $i++) {

            $sign .= $fill[$this->_atom->aToI($position[$i])];
        }

        $this->_sign = $sign;

        return $hash;
    }

    public function getSign()
    {
        return $this->_sign;
    }
}


