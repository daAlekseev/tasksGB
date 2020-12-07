<?php

class DatabaseInsert extends Database
{
    public function insert(string $name,string $login,string $comment) : bool
    {
        $sql = "INSERT INTO forminfo(name, login, comment) VALUES('%s', '%s', '%s')";
        $sqlSprint = sprintf($sql, mysqli_real_escape_string($this->link, $name),
            mysqli_real_escape_string($this->link, $login), mysqli_real_escape_string($this->link, $comment));
        $query = mysqli_query($this->link, $sqlSprint);
        return true;
    }
}
