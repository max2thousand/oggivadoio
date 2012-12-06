<?php

namespace NetSeven\Bundle\OggivadoioBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UtilityControllerTest extends WebTestCase {

    public function testLoginUser() {
        $client = static::createClient();

        $crawler = $client->request('POST', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $buttonCrawlerNode = $crawler->selectButton('_submit');

        $form = $buttonCrawlerNode->form(array('_username' => 'utente41','_password' => 'password'));
        $client->submit($form);
        $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $client->request('GET', '/profile');
        $crawler = $client->followRedirect();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('profile.show.username: utente41', $crawler->filter('div.fos_user_user_show p')->eq(0)->text());
    }

}
