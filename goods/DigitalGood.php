<?php

class DigitalGood extends Good
{
    public function priceCounter() : int
    {
        return $this->price /= 2;
    }
}
