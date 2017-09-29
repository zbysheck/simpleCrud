<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Debug\Debug;

class SplashController extends Controller
{
    /**
     * @Route("/first")
     */
    public function firstAction()
    {
        Debug::enable();
        return $this->render('AppBundle:Splash:first.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/second")
     */
    public function secondAction()
    {
        Debug::enable();

        return $this->render('AppBundle:Splash:second.html.twig', array(
            // ...
        ));
    }

}
