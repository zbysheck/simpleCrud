<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Debug\Debug;

class StationController extends Controller
{
    /**
     * @Route("/list")
     */
    public function listAction()
    {
        Debug::enable();
        return $this->render('AppBundle:Station:list.html.twig', array(
            // ...
        ));
    }

}
