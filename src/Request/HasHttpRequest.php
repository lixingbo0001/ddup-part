<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/9/25
 * Time: 下午5:39
 */

namespace Ddup\Part\Request;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;


trait HasHttpRequest
{

    protected function get($endpoint, $query = [])
    {
        return $this->request('get', $endpoint, [
            'query' => array_merge($query, $this->requestParams()),
        ]);
    }

    protected function post($endpoint, $data, $query = [])
    {
        $data = array_merge($data, $this->requestParams());

        $options['query'] = $query;

        $options['form_params'] = $data;

        return $this->request('post', $endpoint, $options);
    }

    protected function json($endpoint, $data, $query = [])
    {
        $data = array_merge($data, $this->requestParams());

        $options['query'] = $query;
        $options['json']  = $data;

        return $this->request('post', $endpoint, $options);
    }

    protected function request($method, $endpoint, $options = [])
    {
        $options = array_merge($options, $this->requestOptions());

        return $this->unwrapResponse($this->getHttpClient($this->getBaseOptions())->{$method}($endpoint, $options));
    }

    protected function getBaseOptions()
    {
        $options = [
            'base_uri' => $this->getBaseUri(),
            'timeout'  => $this->getTimeout() ?: 3,
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
            return json_decode($contents, true);
        } elseif (false !== stripos($contentType, 'xml')) {
            return json_decode(json_encode(simplexml_load_string($contents)), true);
        }

        return $contents;
    }

    abstract function getBaseUri();

    abstract function getTimeout();

    abstract function requestOptions();

    abstract function requestParams();

}