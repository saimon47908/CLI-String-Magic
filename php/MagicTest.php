<?php

require_once('Magic.php');

class Test extends PHPUnit_Framework_TestCase{

    public function testRevert(){

        $method = new ReflectionMethod(
            'Magic', 'revert'
        );

        $method->setAccessible(true);

        $string = 'Hello World!';
        $modifyString = '!dlroW olleH';

        $this->assertEquals($modifyString, $method->invokeArgs(new Magic($string), [$string]) );
    }

    public function testRemoveChars(){
        $method = new ReflectionMethod(
            'Magic', 'removeChars'
        );

        $method->setAccessible(true);

        $string = 'Hello World!';
        $modifyString = 'Hll Wrld!';

        $this->assertEquals($modifyString, $method->invokeArgs(new Magic($string), [$string]) );
    }

    public function testMagic(){
        $method = new ReflectionMethod(
            'Magic', 'magic'
        );

        $string = 'Hello World!';
        $modifyString = '!dlrW llH';

        $this->assertEquals($modifyString, $method->invoke(new Magic($string)) );
    }
}

?>
