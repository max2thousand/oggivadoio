<?php

namespace NetSeven\Bundle\OggivadoioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="NetSeven\Bundle\OggivadoioBundle\Entity\OrderRepository")
 * @ORM\Table(name="orderz")
 * 
 */
class Order 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    public $number;


    /**
     * @ORM\ManyToMany(targetEntity="NetSeven\Bundle\OggivadoioBundle\Entity\Article", cascade={"persist"})
     */
    private $articles;

    public function __construct() 
    {
        $this->articles = new ArrayCollection();
        $this->number = rand(0, 999999);
    }

    public function addArticle(Article $article) 
    {
        $this->articles->add($article);
    }
    
    public function getArticles()
    {
        return $this->articles;
    }
    
    public function setArticles($articles)
    {
        $this->articles = $articles;
    }

}