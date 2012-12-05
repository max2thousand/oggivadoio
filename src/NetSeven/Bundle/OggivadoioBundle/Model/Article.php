<?php

namespace NetSeven\Bundle\OggivadoioBundle\Model;
use Symfony\Component\Validator\Constraints as Assert;


class Article 
{
    /**
     * @Assert\NotBlank(message="notblank")
     *
     */
    public $name;
    
    public function __construct($name = null) {
        $this->name = $name;
    }    
    
}