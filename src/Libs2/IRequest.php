<?php namespace Ddup\Part\Libs;


class IRequest{

    private static $request_id;

    static function getRequestId()
    {
        if(!self::$request_id){
            self::$request_id = Str::rand(32);
        }

        return self::$request_id;
    }


}