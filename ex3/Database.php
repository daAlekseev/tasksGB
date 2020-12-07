<?php

class Database
{
    protected $link;
    protected $dbHost = "localhost";
    protected $dbName = "tasks";
    protected $dbLogin = "root";
    protected $dbPass = "root";

    public function __construct()
    {
        $this->link = mysqli_connect($this->dbHost, $this->dbLogin, $this->dbPass, $this->dbName);
        if (!$this->link){
            $exception = new Exception('Не удалось подключиться к бд!<br>');
            throw $exception;
        }
    }

    public function showAllTable(string $table) : array
    {
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($this->link, $sql);
        $res = [];
        while ($row = mysqli_fetch_assoc($query)){
            $res[] = $row;
        }
        return $res;
    }
}
