<?php

namespace CarboBundle\Controller;

use CarboBundle\Entity\Hidrato;
use CarboBundle\Form\HidratoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use DateTime;

class HistorialController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }


    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $hidrato_repo = $em->getRepository('CarboBundle:Hidrato');

        $hidratos = $hidrato_repo->findAll();

        return $this->render('CarboBundle:Historial:index.html.twig', array(
            "hidratos" => $hidratos
        ));

    }

    public function editAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $hidrato_repo = $em->getRepository("CarboBundle:Hidrato");

        $hidrato = $hidrato_repo->find($id);

        $form = $this->createForm(HidratoType::class, $hidrato);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            if ($form->isValid()){
                $em = $this->getDoctrine()->getManager();

                $hidrato->setHidratoCarbono($form->get("hidratoCarbono")->getData());
                $hidrato->setHorasEntreno($form->get("horasEntreno")->getData());
                $hidrato->setPeso($form->get("peso")->getData());
                $hidrato->setKmEntreno($form->get("kmEntreno")->getData());

                $fechaCreacion = new DateTime("now");
                $hidrato->setFechaActualizacion($fechaCreacion);

                $em->persist($hidrato);
                $flush = $em->flush();

                if ($flush == null){
                    $status = "La entrada se ha editado correctamente";

                }else{
                    $status = "Error al editar la entrada";

                }


            }else{
                $status = "La entrada no se ha creado porque hay fallos de validacion";
            }

            $this->session->getFlashBag()->add("status", $status);
            return $this->redirectToRoute("carbo_historial_index", array(
                "hidrato" => $hidrato
            ));
        }

        return $this->render('CarboBundle:Historial:edit.html.twig', array(
            "form" => $form->createView(),
            "hidrato" => $hidrato,
        ));


    }

}