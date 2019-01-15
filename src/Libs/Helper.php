<?php namespace Ddup\Part\Libs;

class Helper
{

    static function toCollection($data)
    {
        if ($data instanceof \Illuminate\Support\Collection) {
            return $data;
        }

        return new \Illuminate\Support\Collection(self::toArray($data));
    }

    static function toArray($arrable)
    {
        if (is_array($arrable)) return $arrable;

        if ($arrable instanceof \Illuminate\Contracts\Support\Arrayable) return $arrable->toArray();

        if ($arrable instanceof \Exception) {
            return [
                'code' => $arrable->getCode(),
                'msg'  => $arrable->getMessage(),
                'line' => $arrable->getLine(),
                'file' => $arrable->getFile(),
            ];
        }

        if (is_object($arrable)) {

            if (method_exists($arrable, 'toArray')) return $arrable->toArray();

            return get_object_vars($arrable);
        }

        return $arrable ? (array)$arrable : [];
    }

}



