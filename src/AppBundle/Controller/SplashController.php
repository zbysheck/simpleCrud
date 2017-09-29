<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SplashController extends Controller
{
    /**
     * @Route("/first")
     */
    public function firstAction()
    {
        return $this->render('AppBundle:Splash:first.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/second")
     */
    public function secondAction()
    {
        return $this->render('AppBundle:Splash:second.html.twig', array(
            // ...
        ));
    }

}
