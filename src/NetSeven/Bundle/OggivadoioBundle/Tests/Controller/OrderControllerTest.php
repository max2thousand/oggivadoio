<?php

namespace NetSeven\Bundle\OggivadoioBundle\Tests\Controller;

use NetSeven\Bundle\OggivadoioBundle\Test\OviWebTestCase;

class OrderControllerTest extends OviWebTestCase
{
    public function testCreate()
    {
        $client = static::createClient();

        $client->request('GET', '/order/create');
        $crawler = $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $buttonCrawlerNode = $crawler->selectButton('submit');

        $form = $buttonCrawlerNode->form(array('article[name]' => 'gigi'));
        $crawler = $client->submit($form);

    }
    
}
