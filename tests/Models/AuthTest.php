<?php


namespace Models;



use MyApp\Models\Auth;

final class AuthTest extends \BaseTest
{
    /**
     * @dataProvider filterSign
     * @param $login
     * @param $password
     * @param $expected
     */

    public function testSign($login, $password, $expected)
    {
        $actual = Auth::sign($login, $password);
        $this->assertEquals( $expected, $actual);
    }

    public function filterSign()
    {
        return [
            ['admin', 'admin', 1],
            ['', '', 0],
            ['user', 'user', 1],
            ['root', 'root', 0],
        ];
    }
}