<?php

namespace CarboBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $texto = "Texto desde el controlador";
        return $this->render('CarboBundle:Default:index.html.twig', array(
            'texto' => $texto
        ));
    }
}
