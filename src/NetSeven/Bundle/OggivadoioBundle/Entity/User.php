<?php

namespace NetSeven\Bundle\OggivadoioBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public $order;

    public function createOrder(Order $order) 
    {
        $this->order = $order;
    }
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}