<?php


namespace MyApp\Models;



class Catalog extends BaseModel
{

    const TABLE_CATEGORIES = 'categories';
    const TABLE_GOODS = "goods";
    const TABLE_GOOD_IMAGES = "good_images";

    public static function getCategories()
    {
        return self::db()->getTableData(self::TABLE_CATEGORIES);
    }

    public static function getCategoryTitle(int $id)
    {
        $mas = self::db()->getById(self::TABLE_CATEGORIES, $id);
        if ($mas) {
            return $mas['title'];
        }
        return null;
    }

    public static function getCategoryGoods(int $id)
    {
        return self::db()->getLink()
            ->query('SELECT * FROM '
                .self::TABLE_GOODS. ' JOIN '
                .self::TABLE_GOOD_IMAGES. ' ON goods.id = good_images.good_id WHERE category_id = '
                .(int)$id)
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getGoodById(int $id)
    {
        $mas = self::db()->getLink()
            ->query('SELECT * FROM '
                .self::TABLE_GOODS. ' JOIN '
                .self::TABLE_GOOD_IMAGES.
                ' ON goods.id = good_images.good_id  WHERE goods.id = ' .(int)$id)
            ->fetch(\PDO::FETCH_ASSOC);
        if ($mas) {
            return $mas;
        }
        return null;
    }

    public static function getGoodsByIds(array $ids) : array
    {
        if (empty($ids)) {
            return [];
        }
        $stmt = self::db()->getLink()->query('SELECT * FROM ' . self::TABLE_GOODS . ' WHERE id IN (' . implode(',', $ids) . ')');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}