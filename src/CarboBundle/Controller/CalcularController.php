<?php

namespace CarboBundle\Controller;

use CarboBundle\Entity\Hidrato;
use CarboBundle\Form\HidratoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use DateTime;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CalcularController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }


    public function calculateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $hidrato = new Hidrato();

        $form = $this->createFormBuilder($hidrato)
            ->add('hidratoCarbono', TextType::class, array(
                "label" => "Hidratos: ",
                "required"=>"required",
                "attr"=> array(
                    "class"=>"form-control col-lg-6"
                )
            ))
            ->add('horasEntreno', TimeType::class, array(
                "label" => "Horas de entreno: ",
                "required"=>"required",
                "widget"=>"single_text",
                "attr"=> array(
                    "class"=>"form-control datetimepicker3 col-lg-6",
                )
            ))
            ->add('peso', TextType::class, array(
                "label" => "Peso: ",
                "required"=>"required",
                "attr"=> array(
                    "class"=>"form-control col-lg-6"
                )
            ))
            ->add('Guardar', SubmitType::class,array("attr" => array("class"=>"form-submit btn btn-success")))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            if ($form->isValid()){
                $em = $this->getDoctrine()->getManager();

                $hidrato = new Hidrato();
                $hidrato->setHidratoCarbono($form->get("hidratoCarbono")->getData());
                $hidrato->setHorasEntreno($form->get("horasEntreno")->getData());
                $hidrato->setPeso($form->get("peso")->getData());

                $fechaCreacion = new DateTime("now");
                $hidrato->setFechaCreacion($fechaCreacion);

                $user = $this->getUser();
                $hidrato->setUser($user);

                $em->persist($hidrato);
                $flush = $em->flush();


                if ($flush == null){
                    $status = "La entrada se ha creado correctamente";

                }else{
                    $status = "Error al añadir la entrada";

                }


            }else{
                $status = "La categoria no se ha creado porque hay fallos de validacion";
            }

            $this->session->getFlashBag()->add("status", $status);
            return $this->redirectToRoute("carbo_calc_index", array(
                "hidrato" => $hidrato
            ));
        }


        return $this->render('CarboBundle:Calcular:index.html.twig', array(
            "form" => $form->createView(),
        ));
    }


}
