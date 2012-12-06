<?php

namespace NetSeven\Bundle\OggivadoioBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {
    
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }
    
    public function getOrder() {
        return 1;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $userManager = $this->container->get('fos_user.user_manager');
        for ($i = 1; $i < 20; $i++) {
            $user = $userManager->createUser();
            $user->setUsername('utente' . $i);
            $user->setEmail('utente' . $i . '@example.com');
            $user->setEnabled(true);
            $user->setPlainPassword('password');
            $userManager->updateUser($user);

            $manager->persist($user);
        }
        $manager->flush();
    }

}