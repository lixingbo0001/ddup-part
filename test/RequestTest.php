<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/15
 * Time: 下午9:33
 */

class RequestTest extends \PHPUnit\Framework\TestCase
{

    use \Ddup\Part\Request\HasHttpRequest;
    use \Ddup\Part\Api\ApiResulTrait;

    public function newResult($ret):\Ddup\Part\Api\ApiResultInterface
    {
        return new \Ddup\Part\Test\Provider\ResultProvider($ret);
    }

    public function getTimeout()
    {
        return 3;
    }

    public function requestOptions()
    {
        return [];
    }

    public function requestParams()
    {
        return [
            'account' => 'blue'
        ];
    }

    public function getBaseUri()
    {
        return 'http://localhost:8000';
    }

    public function test_json()
    {
        $response = $this->json('', ['age' => 20]);

        $this->parseResult($response);

        $this->assertNotNull($response);

        $this->assertEquals('application/json', $this->result()->getData()->get('CONTENT_TYPE'));

        $this->assertTrue($this->result()->isSuccess());
    }

    public function test_post()
    {
        $response = $this->post('', ['age' => 20]);

        $this->parseResult($response);

        $this->assertEquals('application/x-www-form-urlencoded', $this->result()->getData()->get('CONTENT_TYPE'));
    }
}