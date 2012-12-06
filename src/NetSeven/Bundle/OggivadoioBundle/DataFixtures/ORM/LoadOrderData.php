<?php

namespace NetSeven\Bundle\OggivadoioBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use NetSeven\Bundle\OggivadoioBundle\Entity\Order;

class LoadOrderData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function getOrder() {
        return 2;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        for ($i = 1; $i <= 20; $i++) {
            $order = new Order();

            $orderNumber = $i;
            $order->number = $orderNumber;
            $article = $this->getReference('article_'.$i);
            $order->addArticle($article);
            $manager->persist($order);
        }
        $manager->flush();
    }

}