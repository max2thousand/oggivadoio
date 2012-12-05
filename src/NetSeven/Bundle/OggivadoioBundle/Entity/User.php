<?php

namespace NetSeven\Bundle\OggivadoioBundle\Entity;

class User 
{
    public $order;

    public function createOrder(Order $order) 
    {
        $this->order = $order;
    }

}