<?php

class PhysicalGood extends Good
{
    public function priceCounter() : int
    {
        return $this->price;
    }
}
