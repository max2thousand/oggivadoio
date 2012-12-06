<?php

namespace NetSeven\Bundle\OggivadoioBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use NetSeven\Bundle\OggivadoioBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

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
        for ($i = 1; $i <= 20; $i++) {
            $article = new Article();

            $article->name = 'article_' . $i;
            $this->setReference('article_' . $i, $article);
            $manager->persist($article);
        }
        $manager->flush();
    }

}