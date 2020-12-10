<?php

trait Singleton
{
    private static $instance;
    
    public static function call()
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {   
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

}



