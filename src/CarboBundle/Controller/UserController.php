<?php

namespace CarboBundle\Controller;

use CarboBundle\Entity\User;
use CarboBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function loginAction(Request $request){

        $authenticationUtils = $this->get("security.authentication_utils");
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        //validar el formulario
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            if ($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $user_repo = $em->getRepository('BlogBundle:User');
                $user = $user_repo->findOneBy(array("email" => $form->get("email")->getData()));

                if (count($user) == 0){
                    $user = new User();
                    $user->setName($form->get("name")->getData());
                    $user->setSurname($form->get("surname")->getData());
                    $user->setEmail($form->get("email")->getData());

                    //llamada al servicio del encoder
                    $factory = $this->get("security.encoder_factory");
                    $encoder = $factory->getEncoder($user);
                    $password = $encoder->encodePassword($form->get("password")->getData(), $user->getSalt());

                    $user->setPassword($password);
                    $user->setRole("ROLE_USER");

                    $em = $this->getDoctrine()->getEntityManager();
                    $em->persist($user);

                    $flush = $em->flush();

                    if ($flush == null){
                        $status = "Usuario creado correctamente";
                    }else{
                        $status = "No te has registado correctamente";
                    }

                }else{
                    $status = "El usuario ya existe";
                }
            }else{
                $status = "No te has registado correctamente";
            }
            //Mensaje flash para la sesion
            $this->session->getFlashBag()->add("status", $status);

        }


        return $this->render('CarboBundle:User:login.html.twig', array(
            "error" => $error,
            "lastUsername" => $lastUsername,
            "form" => $form->createView()
        ));

    }
}
