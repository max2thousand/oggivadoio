<?php

namespace NetSeven\Bundle\OggivadoioBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table()
 * 
 */
class Article 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     * @Assert\NotBlank(message="notblank")
     * @ORM\Column(type="string", length=100)
     */
    public $name;
    
    public function __construct($name = null) {
        $this->name = $name;
    }    
    
}