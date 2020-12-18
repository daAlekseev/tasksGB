<?php


namespace MyApp\Models;


class Admin extends BaseModel
{
    const TABLE_ORDERS = "orders";
    const TABLE_USERS_ROLES = "users_roles";

    public static function getOrders()
    {
        return self::db()->getLink()->query('SELECT * FROM ' .self::TABLE_ORDERS. ' ORDER BY id DESC');
    }

    public static function changeStatus($id, $status)
    {
        self::db()->getLink()
            ->query('UPDATE ' . self::TABLE_ORDERS . ' SET status = ' .(int)$status. ' WHERE id = ' .(int)$id);
        return true;
    }

    public static function checkRole($id)
    {
        $mas = self::db()->getLink()
            ->query('SELECT * FROM ' .self::TABLE_USERS_ROLES. ' WHERE user_id = ' .(int)$id)
            ->fetch(\PDO::FETCH_ASSOC);
        return $mas['role'];
    }
}