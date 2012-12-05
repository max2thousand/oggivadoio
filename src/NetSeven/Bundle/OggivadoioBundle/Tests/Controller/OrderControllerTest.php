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
        $this->assertEquals(3, $crawler->filter('li')->count());
    }
}
