<?php

class ConversionTest extends PHPUnit_Framework_TestCase
{
    public function dataProvider()
    {
        return array(
            array('', null, ''),
            array('false', null, false),
            array('FALSE', null, false),
            array('true', null, true),
            array('True', null, true),
            array('NULL', null, null),
            array('null', null, null),
            array('123', null, 123),
            array('123.4', null, '123.4'),
            array('"hello"', null, 'hello'),
            array("'hello'", null, 'hello'),
            array('false', 0, 'false'),
            array('FALSE', Env::CONVERT_INT, 'FALSE'),
            array('23', Env::CONVERT_INT, 23),
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testConversions($value, $options, $expected)
    {
        $result = Env::convert($value, $options);

        $this->assertSame($expected, $result);
    }

    public function testEnv()
    {
        $this->assertTrue(Env::init());

        putenv('FOO=123');

        $this->assertSame(123, env('FOO'));

        $this->assertFalse(Env::init());
    }
}
