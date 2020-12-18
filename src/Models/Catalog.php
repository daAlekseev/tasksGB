<?php


namespace MyApp\Models;



class Catalog extends BaseModel
{

    const TABLE_CATEGORIES = 'categories';
    const TABLE_GOODS = "goods";


    public static function getCategories()
    {
        return self::db()->getTableData(self::TABLE_CATEGORIES);
    }

    public static function getCategoryTitle($id)
    {
        $mas = self::db()->getById(self::TABLE_CATEGORIES, $id);
        if ($mas) {
            return $mas['title'];
        }
        return null;
    }

    public static function getCategoryGoods($id)
    {
        return self::db()->getLink()
            ->query('SELECT * FROM ' . self::TABLE_GOODS . ' WHERE category_id = ' . (int)$id)
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getGoodById($id)
    {
        $mas = self::db()->getById(self::TABLE_GOODS, $id);
        if ($mas) {
            return $mas;
        }
        return null;
    }

    public static function getGoodsByIds(array $ids)
    {
        if (empty($ids)) {
            return [];
        }
        $stmt = self::db()->getLink()->query('SELECT * FROM ' . self::TABLE_GOODS . ' WHERE id IN (' . implode(',', $ids) . ')');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}