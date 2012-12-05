<?php

namespace NetSeven\Bundle\OggivadoioBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderControllerTest extends WebTestCase
{
    public function testCreate()
    {
        $client = static::createClient();

        $client->request('GET', '/order/create');
        $crawler = $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        //$this->assertEquals(3, $crawler->filter('ul.articles li')->count()); 
        
        $buttonCrawlerNode = $crawler->selectButton('submit');

        $form = $buttonCrawlerNode->form(array('article[name]' => 'gigi'));
        $crawler = $client->submit($form);

//        $this->assertEquals(4, $crawler->filter('ul.articles li')->count()); 
//        $this->assertEquals('gigi', $crawler->filter('ul.articles li')->eq(3)->text()); 
        
        
    }
    
    
}
