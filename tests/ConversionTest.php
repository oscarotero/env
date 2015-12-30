<?php

class ConversionTest extends PHPUnit_Framework_TestCase
{
    public function dataProvider()
    {
        return [
            ['false', null, false],
            ['FALSE', null, false],
            ['true', null, true],
            ['True', null, true],
            ['NULL', null, null],
            ['null', null, null],
            ['123', null, 123],
            ['123.4', null, '123.4'],
            ['"hello"', null, 'hello'],
            ["'hello'", null, 'hello'],
            ['false', 0, 'false'],
            ['FALSE', Env::CONVERT_INT, 'FALSE'],
            ['23', Env::CONVERT_INT, 23],
        ];
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
        Env::init();
        putenv('FOO=123');

        $this->assertSame(123, env('FOO'));
    }
}
