<?php

namespace NetSeven\Bundle\OggivadoioBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use NetSeven\Bundle\OggivadoioBundle\Entity\News;

class LoadNewsData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function getOrder() {
        return 3;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        for ($i = 1; $i <= 20; $i++) {
            $news = new News();

            $news->title = 'Titolo ' . $i;
            $news->body = 'Corpo ' . $i;
            $manager->persist($news);
        }
        $manager->flush();
    }

}