<?php

namespace CarboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class HidratoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hidratoCarbono', TextType::class, array(
                "label" => "Hidratos: ",
                "required"=>"required",
                "attr"=> array(
                    "class"=>"form-control"
                )
            ))
            ->add('horasEntreno', TimeType::class, array(
                "label" => "Horas de entreno: ",
                "required"=>"required",
                "widget"=>"single_text",
                "attr"=> array(
                    "class"=>"form-control datetimepicker3",
                )
            ))
            ->add('kmEntreno', TextType::class, array(
                "label" => "Kilometros: ",
                "required"=>"required",
                "attr"=> array(
                    "class"=>"form-control"
                )
            ))
            ->add('ruta', TextType::class, array(
                "label" => "Nombre de la ruta: ",
                "attr"=> array(
                    "class"=>"form-control"
                )
            ))
            ->add('peso', TextType::class, array(
                "label" => "Peso: ",
                "required"=>"required",
                "attr"=> array(
                    "class"=>"form-control"
                )
            ))
            ->add('Guardar', SubmitType::class,array("attr" => array("class"=>"form-submit btn btn-success")))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CarboBundle\Entity\Hidrato'
        ));
    }
}
