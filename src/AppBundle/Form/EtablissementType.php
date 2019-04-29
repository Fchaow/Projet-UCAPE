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
use AppBundle\Entity\Etablissement;

class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEtablissement', TextType::class, [
                    'label' => 'Nom de l\'établissement',

                    'required' => true,

                ])
        
            ->add('telEtablissement', TextType::class, [
                'label' => 'Téléphone de l\'établissement',

                'required' => true,

            ])
        
            ->add('emailEtablissement', TextType::class, [
                'label' => 'Adresse e-mail de l\'établissement',

                'required' => true,

            ])
        
            ->add('responsableEtablissement', TextType::class, [
                'label' => 'Responsable de l\'établissement',

                'required' => true,

            ])
        
            ->add('numeroEtablissement', IntegerType::class, [
                'label' => 'Numéro de l\'établissement',

                'required' => true,

            ])
        
            ->add('rueEtablissement', TextType::class, [
                'label' => 'Rue de l\'établissement',

                'required' => true,

            ])
        
            ->add('villeEtablissement', TextType::class, [
                'label' => 'Ville de l\'établissement',

                'required' => true,


            ])
            ->add('pays', EntityType::class, array(
                'class'        => 'AppBundle\Entity\Pays',
                'choice_label' => 'libellePays',
                'multiple'     => false,
                'expanded'     => false,
                'required' => true,

              ))
            
            ->add('submit', SubmitType::class, [ 'label' => 'Valider']);
      
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Etablissement',
            'is_edit' => false
        ));
    }
}