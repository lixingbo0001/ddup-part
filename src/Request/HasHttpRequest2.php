<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/9/25
 * Time: 下午5:39
 */

namespace Ddup\Part\Request;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\ResponseInterface;


trait HasHttpRequest2
{

    /**
     * @var HandlerStack
     */

    protected $handlerStack;

    /**
     * @var int
     */
    protected $timeout     = 3;
    protected $middlewares = [];

    public function get($endpoint, $query = [])
    {
        return $this->request('get', $endpoint, $query);
    }

    public function post($endpoint, $data)
    {
        return $this->request('post', $endpoint, $data);
    }

    public function json($endpoint, $data)
    {
        return $this->request('json', $endpoint, $data);
    }

    public function request($method, $endpoint, $data, $options = [])
    {

        switch (strtolower($method)) {
            case 'get':

                $options['query'] = array_merge($data, $this->requestParams());

                break;
            case 'post':

                if (is_array($data)) {
                    $data                   = array_merge($data, $this->requestParams());
                    $options['form_params'] = $data;
                } else {
                    $options['body'] = $data;
                }

                break;
            case 'json':

                $method = 'post';

                $options['json'] = array_merge($data, $this->requestParams());

                break;
        }

        $options = array_merge($this->requestOptions(), ['handler' => $this->getHandlerStack()], $options);

        return $this->wrapResponse($this->unwrapResponse($this->getHttpClient($this->getBaseOptions())->{$method}($endpoint, $options)));
    }

    public function getHandlerStack():HandlerStack
    {
        if ($this->handlerStack) {
            return $this->handlerStack;
        }

        $this->handlerStack = HandlerStack::create();

        foreach ($this->middlewares as $name => $middleware) {
            $this->handlerStack->push($middleware, $name);
        }

        return $this->handlerStack;
    }

    public function pushMiddleware(callable $middleware, string $name)
    {
        $this->middlewares[$name] = $middleware;

        return $this;
    }

    protected function getBaseOptions()
    {
        $options = [
            'base_uri' => $this->getBaseUri(),
            'timeout'  => $this->timeout,
        ];

        return $options;
    }

    protected function getHttpClient(array $options = [])
    {
        return new Client($options);
    }

    protected function unwrapResponse(ResponseInterface $response)
    {
        $contentType = $response->getHeaderLine('Content-Type');
        $contents    = $response->getBody()->getContents();

        if (false !== stripos($contentType, 'json') || stripos($contentType, 'javascript')) {

            $json = json_decode($contents, true);

            //如果解析json出错，就返回原始数据
            if (json_last_error() != JSON_ERROR_NONE) {
                return $contents;
            }

            return $json;

        } elseif (false !== stripos($contentType, 'xml')) {
            return json_decode(json_encode(simplexml_load_string($contents)), true);
        }

        return $contents;
    }

    /**
     * @desc 包装response内容
     * @param $content
     * @return mixed
     */
    protected function wrapResponse($content)
    {
        return $content;
    }

    abstract function getBaseUri();

    abstract function requestOptions();

    abstract function requestParams();

}