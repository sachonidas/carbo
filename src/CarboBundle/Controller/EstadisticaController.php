<?php

namespace CarboBundle\Controller;

use CarboBundle\Entity\Hidrato;
use CarboBundle\Form\HidratoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class EstadisticaController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }


    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $hidrato_repo = $em->getRepository("CarboBundle:Hidrato");
        $hidratos = $hidrato_repo->findAll();

        $peso = 0;
        $mediaPeso = $hidrato_repo->getPesoMedio();
        $mediaHidratos = $hidrato_repo->getHidratoMedio();
        $mediaHoras = $hidrato_repo->getHorasMedia();
        $numVariables = 0;
        $numVariables = count($hidratos);

        return $this->render('CarboBundle:Estadistica:index.html.twig', array(
            "peso" => $peso,
            "variables" => $numVariables,
            "mediaPeso" => $mediaPeso,
            "mediaHidratos" => $mediaHidratos,
            "mediaHoras" => $mediaHoras,
            "hidratos" => $hidratos
        ));
    }




}
