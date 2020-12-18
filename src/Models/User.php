<?php


namespace MyApp\Models;


class User extends BaseModel
{

    const TABLE_USERS = "users";

    public static function getUserId($login)
    {
        $stmt = self::db()->getLink()->prepare('SELECT * FROM users WHERE login = :login LIMIT 1');
        $stmt->bindParam(':login', $login, \PDO::PARAM_STR);
        $stmt->execute();
        $mas = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (empty($mas)) {
            return false;
        }
        return $mas;
    }
}