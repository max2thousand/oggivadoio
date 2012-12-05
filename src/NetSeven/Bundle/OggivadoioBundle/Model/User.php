<?php

namespace NetSeven\Bundle\OggivadoioBundle\Model;

class User 
{
    public $order;

    public function createOrder(Order $order) 
    {
        $this->order = $order;
    }

}
