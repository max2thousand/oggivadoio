<?php

namespace NetSeven\Bundle\OggivadoioBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class OviWebTestCase extends WebTestCase
{
    public function login() {
        $client = static::createClient();

        $crawler = $client->request('POST', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $buttonCrawlerNode = $crawler->selectButton('_submit');

        $form = $buttonCrawlerNode->form(array('_username' => 'utente1', '_password' => 'password'));
        $client->submit($form);
        $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        return $client;
    }

    
}
