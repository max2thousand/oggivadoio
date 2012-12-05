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

class UtilityController extends Controller {

    /**
     * @Route("/utility/user_create/{from}/{to}", name="utility_user_create")
     * @Template()
     */
    public function createUsersAction($from, $to) {

        if ($from < 0) $from = 0;
        if ($to < $from) $to = $from + 1;
        
        $userManager = $this->get('fos_user.user_manager');
        $em = $this->getDoctrine()->getManager();
        try {
            for ($i = $from; $i < $to; $i++) {
                $user = $userManager->createUser();
                $user->setUsername('utente'.$i);
                $user->setEmail('utente'.$i.'@example.com');
                $user->setPassword('utente'.$i.'@example.com');
                $userManager->updateUser($user);
                $em->persist($user);
            }
            $em->flush();
        } catch (\Exception $e) {
           $this->get('session')->getFlashBag()->add('warning', 'Non ho salvato i tuoi utenti!!');
        }
        
        $users = $em->getRepository('NetSevenOggivadoioBundle:User')->findAll();
        return array("users" => $users);
    }

}
