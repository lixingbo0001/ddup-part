<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/12/21
 * Time: 下午7:43
 */

namespace Ddup\Part\Test;


use Ddup\Part\Test\Provider\UserOptionProvider;
use PHPUnit\Framework\TestCase;

class PropertyReadableTest extends TestCase
{

    public function test_render()
    {
        $data = [
            'age'        => 19,
            'sex'        => 'boy',
            'name'       => 'blue',
            'not_exists' => '不是属性'
        ];

        $object = new UserOptionProvider($data);

        $this->assertEquals($data['age'], $object->age);
        $this->assertEquals($data['name'], $object->name);
        $this->assertEquals($data['sex'], $object->sex);
        $this->assertEquals('boy', $object->sex);

        $this->assertNull($object->hobby);

        $this->assertObjectNotHasAttribute('not_exists', $object);

        $this->assertEquals('不是属性', $object->get('not_exists'));
    }

    public function test_valuesEqaul()
    {
        $data = [
            'age'   => 19,
            'sex'   => 'boy',
            'name'  => 'blue',
            'hobby' => null
        ];

        $object = new UserOptionProvider($data);

        $this->assertEquals($object->toArray(), $data);
    }


}