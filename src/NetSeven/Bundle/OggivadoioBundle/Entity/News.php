<?php

namespace NetSeven\Bundle\OggivadoioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="NetSeven\Bundle\OggivadoioBundle\Entity\NewsRepository")
 * @ORM\Table(name="news")
 * @ORM\HasLifecycleCallbacks
 * 
 */
class News 
{
    
    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;
    
    
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     *
     * @ORM\Column(type="string", length=100)
     */
    public $title;


    /**
     * @ORM\Column(type="text")
     */
    public $body;
    
    
    
    public function __construct($title = null, $body = null) 
    {
        $this->title = $title;
        $this->body = $body;
    }

    public function getCreated() 
    {
        return $this->created;
    }
    
    public function getUpdated()
    {
        return $this->updated;
    }
    
}