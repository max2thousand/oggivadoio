<?php

namespace NetSeven\Bundle\OggivadoioBundle\Tests\Unit;


use NetSeven\Bundle\OggivadoioBundle\Entity\Order;
use NetSeven\Bundle\OggivadoioBundle\Entity\Article;
use Doctrine\Common\Collections\ArrayCollection;

class OrderTest extends \PHPUnit_Framework_TestCase{

    
    
    public function setUp(){
        $this->order = new Order();
    }
    
    public function testOrderCreation(){
        $this->order->addArticle(new Article('zuppa ajo'));
        
        $this->assertEquals(1, count($this->order->getArticles()));
    }
   
}
