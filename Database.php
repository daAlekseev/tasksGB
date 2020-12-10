<?php

class Database
{
    use Singleton;

    private $link;
    private static $connect = [
        'dsn' => "mysql:dbname=tasks;host=127.0.0.1",
        'login' => "root",
        'pwd' => "root",
    ];

    private function __construct()
    {
        try {
            $this->link = new PDO(
                self::$connect['dsn'],
                self::$connect['login'],
                self::$connect['pwd'],
            );
        } catch (PDOException $e){
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    public function show(string $table, int $offset, int $limit): ?array
    {
        try {
            $this->link->query("SET NAMES 'utf8'");
            $mas = $this->link
                ->query("SELECT * FROM $table LIMIT $limit OFFSET $offset")
                ->fetchAll(PDO::FETCH_ASSOC);
            return $mas;
        } catch (Throwable $e){
            return null;
        }
    }
}
