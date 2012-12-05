<?php

namespace NetSeven\Bundle\OggivadoioBundle\Model;

class Article 
{
    public $name;
    
    public function __construct($name) {
        $this->name = $name;
    }    
    
}