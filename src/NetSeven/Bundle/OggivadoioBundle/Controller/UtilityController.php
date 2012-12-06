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

        if (($from >= 0) && ($to > $from)) {
            $userManager = $this->get('fos_user.user_manager');
            $em = $this->getDoctrine()->getManager();
            try {
                for ($i = $from; $i < $to; $i++) {
                    $user = $userManager->createUser();                    
                    $user->setUsername('utente' . $i);
                    $user->setEmail('utente' . $i . '@example.com');
                    $user->setEnabled(true);
                    $user->setPlainPassword('password');
                    $userManager->updateUser($user);
                    $em->persist($user);
                }
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice', 'Utenti creati correttamente!!');
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('warning', sprintf('Non posso salvare gli utenti con i parametri che mi hai passato [%s %s]!!', $from, $to));
            }
        } else {
            $this->get('session')->getFlashBag()->add('warning', 'Dammi dei parametri corretti per creare gli utenti!');
        }

        $users = $em->getRepository('NetSevenOggivadoioBundle:User')->findAll();
        return array("users" => $users);
    }

}
