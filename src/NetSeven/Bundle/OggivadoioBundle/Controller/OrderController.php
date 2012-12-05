<?php

namespace NetSeven\Bundle\OggivadoioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NetSeven\Bundle\OggivadoioBundle\Model\User;
use NetSeven\Bundle\OggivadoioBundle\Model\Order;
use NetSeven\Bundle\OggivadoioBundle\Model\Article;

class OrderController extends Controller
{
    /**
     * @Route("/order/create/")
     * @Template()
     */
    public function createAction()
    { 
        $user = new User();
        $order = new Order();
        $user->createOrder($order);
        $user->order->addArticleToOrder(new Article('Zuppa toscana'));
        $user->order->addArticleToOrder(new Article('Zuppa mediterranea'));
        $user->order->addArticleToOrder(new Article('Zuppa ortolana'));
        
        return array('order' => $user->order);
    }
    
    
}
