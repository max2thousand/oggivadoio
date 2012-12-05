<?php

namespace NetSeven\Bundle\OggivadoioBundle\Model;

class Order 
{

    public $articles;

    public function __construct() 
    {
        $this->articles = array();
    }

    public function addArticleToOrder(Article $article) 
    {
        $this->articles[] = $article;
    }

}