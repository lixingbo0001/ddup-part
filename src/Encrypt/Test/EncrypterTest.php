<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2020/3/9
 * Time: 下午6:18
 */

namespace App\Tool\Auth\Simple\Test;


use Ddup\Part\Encrypt\EncryptDdup;
use Ddup\Part\Test\TestCase;

class EncrypterTest extends TestCase
{


    function test_encode()
    {
        $encrypter = new EncryptDdup();

        $sign   = "12344444382838232332s32" . time();
        $origin = "aaa7(Njdjsdf((#KEnldlksjaklfdjkladdsad";

        $token = $encrypter->encode($origin, $sign);

        $this->assertNotNull($token, "加密");

        $this->assertEquals($origin, $encrypter->decode($token), "解密");
        $this->assertEquals($sign, $encrypter->getSign(), "解密");
    }

    function test_encodeCritical()
    {
        $encrypter = new EncryptDdup();

        try {
            $sign = str_repeat("a", 63);
            $encrypter->encode("addd", $sign);
        } catch (\Exception $exception) {
            $this->assertEquals('返回的字典长度不能大于区间', $exception->getMessage(), '临界值测试');
        }
    }
}
