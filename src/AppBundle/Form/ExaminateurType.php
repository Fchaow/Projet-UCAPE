<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Examinateur;

class ExaminateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomExaminateur', TextType::class, [
                    'label' => 'Nom de l\'examinateur',

                    'required' => true,

                ])
        
            ->add('prenomExaminateur', TextType::class, [
                'label' => 'Prénom de l\'examinateur',

                'required' => true,

            ])
        
            ->add('telephoneExaminateur', TextType::class, [
                'label' => 'Numéro de téléphone de l\'examinateur',

                'required' => true,

            ])

            ->add('langues', EntityType::class, array(
                'class'        => 'AppBundle\Entity\Langue',
                'choice_label' => 'libelleLangue',
                'multiple'     => false,
                'expanded'     => false,
                'required' => true,
                
              ))
            
            ->add('submit', SubmitType::class, [ 'label' => 'Valider']);
      
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Examinateur',
            'is_edit' => false
        ));
    }
}