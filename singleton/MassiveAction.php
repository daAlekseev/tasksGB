<?php

trait MassiveAction
{
    private $mas = [];

    public function action(int $num) : array
    {
        if(count($this->mas) <= 2){
            array_push($this->mas, $num);
        }
        else{
            array_unshift($this->mas, $num);
        }
        return $this->mas;
    }
    
    public function showMas()
    {
        return print_r($this->mas);
    }
}