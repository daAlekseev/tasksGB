<?php

final class RouterTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider filterProvider
     * @param $url
     * @param $expected
     */
    public function testFilter($url, $expected)
    {
        $actual = \MyApp\Router::filter($url);
        $this->assertEquals($expected, $actual);
    }

    public function filterProvider()
    {
        return [
            ['/sdfg///dfgdf/', 'sdfg/dfgdf'],
            ['/', ''],
            ['//dfgdf/', 'dfgdf'],
            ['', ''],
        ];
    }
}