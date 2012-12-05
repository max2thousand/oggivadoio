<?php

namespace NetSeven\Bundle\OggivadoioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NetSeven\Bundle\OggivadoioBundle\Model\User;
use NetSeven\Bundle\OggivadoioBundle\Model\Order;
use NetSeven\Bundle\OggivadoioBundle\Model\Article;
use NetSeven\Bundle\OggivadoioBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller
{
    /**
     * @Route("/order/create/", name="order_create")
     * @Template()
     */
    public function createAction(Request $request)
    { 
        $form = $this->createForm(new ArticleType(), new Article());
        
        
        $user = new User();
        $order = new Order();
        $user->createOrder($order);
        $user->order->addArticleToOrder(new Article('Zuppa toscana'));
        $user->order->addArticleToOrder(new Article('Zuppa mediterranea'));
        $user->order->addArticleToOrder(new Article('Zuppa ortolana'));
        
        if ($request->isMethod('POST')) {
            $form->bind($request);
            
            $article = $form->getData();
           
            $user->order->addArticleToOrder($article);
        }
        
        return array('form' => $form->createView(), 'order' => $user->order);
    }
    
    
}
