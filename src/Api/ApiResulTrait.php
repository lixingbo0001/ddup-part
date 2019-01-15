<?php namespace Ddup\Part\Api;



Trait ApiResulTrait
{
    /**
     * @var ApiResultInterface $result ;
     */
    public $result;

    abstract function newResult($ret):ApiResultInterface;

    final protected function parseResult($ret):ApiResultInterface
    {
        $this->result = $this->newResult($ret);
        return $this->result;
    }

    final public function result():ApiResultInterface
    {
        if (!$this->result) $this->result = $this->newResult('');
        return $this->result;
    }
}