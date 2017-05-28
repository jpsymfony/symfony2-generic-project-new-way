<?php

namespace AppBundle\Form\Type;

use Jpsymfony\CoreBundle\Form\DataTransformer\TextToDateTimeDataTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('id', HiddenType::class)
        ->add('firstName', TextType::class, array('label' => 'acteur.nom'))
        ->add('lastName', TextType::class, array('label' => 'acteur.prenom'))
        ->add('birthday', BirthdayType::class, array('label' => 'acteur.dateNaissance'))
        ->add('sex', ChoiceType::class, array(
            'choices' => array('Féminin'=>'F', 'Masculin'=>'M'),
            'choices_as_values' => true,
            'label' => 'acteur.sexe'
            ))

        ->add('Valider', SubmitType::class, array(
            'attr' => ['class' => 'btn btn-primary btn-lg btn-block'],
            'label' => 'valider'
        ));
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'AppBundle\Entity\Actor',
            )
        );
    }
}
