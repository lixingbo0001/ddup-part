<?php namespace Ddup\Part\User;


use Ddup\Part\Libs\Helper;
use Ddup\Part\Message\AttributeAble;

abstract class UserAbstraict implements UserInterface
{
    use AttributeAble;

    protected $model;

    protected function __construct()
    {
    }

    public function model()
    {
        return $this->model;
    }

    public function init($user)
    {
        $this->model = $user;

        $data = Helper::toArray($user);

        foreach ($data as $name => $value) {
            $this->setAttribute($name, $value);
        }
    }

}
