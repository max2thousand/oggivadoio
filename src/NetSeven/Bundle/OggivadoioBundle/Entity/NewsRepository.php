<?php

namespace NetSeven\Bundle\OggivadoioBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

class NewsRepository extends EntityRepository
{
    public function getLatestNews($number) {
        $query = $this->createQueryBuilder('n')
                ->orderBy('n.created','DESC')
                ->setMaxResults($number)
                ->getQuery();
        
        return $query->getResult();
    }
}
