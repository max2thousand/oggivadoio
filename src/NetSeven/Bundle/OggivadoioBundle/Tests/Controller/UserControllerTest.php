<?php

namespace NetSeven\Bundle\OggivadoioBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use NetSeven\Bundle\OggivadoioBundle\Test\OviWebTestCase;

class UserControllerTest extends OviWebTestCase {

    public function testLoginUser() {
        
        $client = $this->login();
        
        $client->request('GET', '/profile');
        $crawler = $client->followRedirect();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('profile.show.username: utente1', $crawler->filter('div.fos_user_user_show p')->eq(0)->text());
    }
    
}
