<?php


namespace MyApp\Models;

class Auth
{
    public static function sign($login, $password)
    {
        return \MyApp\App::instance()->getDb()->getLink()
            ->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
        $num->bindParam(':login', $login, \PDO::PARAM_STR);
        $num->bindParam(':password', $password, \PDO::PARAM_STR);
        $num->execute()->rowCount();
    }

}
