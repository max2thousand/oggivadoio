<?php

namespace NetSeven\Bundle\OggivadoioBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use NetSeven\Bundle\OggivadoioBundle\Test\OviWebTestCase;

class NewsControllerTest extends OviWebTestCase {

    public function testCreate() {
        
        
        $client = static::createClient();

        $client->request('GET', '/news/create');
        $crawler = $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $buttonCrawlerNode = $crawler->selectButton('submit');

        $form = $buttonCrawlerNode->form(array('news[title]' => 'titolo', 'news[body]' => 'body'));
        $crawler = $client->submit($form);
        
        $this->assertEquals('titolo', $crawler->filter('h3')->text());
        $this->assertEquals('body', $crawler->filter('div.news div')->text());
    }
    
    public function testList() {
        $client = static::createClient();

        $client->request('GET', '/news/list');
         $crawler = $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(3, $crawler->filter('.news li')->count());
    }
    
}
