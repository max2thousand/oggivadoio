<?php

namespace NetSeven\Bundle\OggivadoioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NetSeven\Bundle\OggivadoioBundle\Entity\News;
use NetSeven\Bundle\OggivadoioBundle\Form\NewsType;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller {

    /**
     * @Route("/news/create/", name="news_create")
     * @Template()
     */
    public function createAction(Request $request) {
        $em = $this->get('doctrine')->getEntityManager();
        $form = $this->createForm(new NewsType(), new News());
        $news = null;

        if ($request->isMethod('POST')) {
            $form->bind($request);
            $news = $form->getData();
            $em->persist($news);
            $em->flush();
        }

        return array('form' => $form->createView(), 'news' => $news);
    }

    /**
     * @Route("/news/list/", name="news_list")
     * @Template()
     */
    public function newsListAction() {

        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('NetSevenOggivadoioBundle:News')->getLatestNews(3);

        return array('news' => $news);
    }

}
