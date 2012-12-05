<?php

namespace NetSeven\Bundle\OggivadoioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NetSeven\Bundle\OggivadoioBundle\Entity\User;
use NetSeven\Bundle\OggivadoioBundle\Entity\Order;
use NetSeven\Bundle\OggivadoioBundle\Entity\Article;
use NetSeven\Bundle\OggivadoioBundle\Form\ArticleType;
use NetSeven\Bundle\OggivadoioBundle\Entity\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;


class OrderController extends Controller {

    /**
     * @Route("/order/create/", name="order_create")
     * @Template()
     */
    public function createAction(Request $request) {
        $em = $this->get('doctrine')->getEntityManager();
        $form = $this->createForm(new ArticleType(), new Article());

        $user = new User();
        $order = new Order();
        $em->persist($order);
        $user->createOrder($order);

        if ($request->isMethod('POST')) {
            $form->bind($request);
            $article = $form->getData();
            $em->persist($article);
            $user->order->addArticle($article);
            $em->flush();
        }

        return array('form' => $form->createView(), 'order' => $user->order);
    }

    /**
     * @Route("/article/list/", name="article_list")
     * @Template()
     */
    public function articleListAction() {

        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('NetSevenOggivadoioBundle:Article')->findAll();
        
        return array('articles' => $articles);
    }

}
