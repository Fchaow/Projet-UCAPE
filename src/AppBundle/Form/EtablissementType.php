<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Etablisement;

class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelleEtablissement', TextType::class, [
                'label' => 'Libellé de l\'établissement',
                
            ])
        
            ->add('nomEtablissement', TextType::class, [
                    'label' => 'Nom de l\'établissement',

                ])
        
            ->add('telEtablissement', TextType::class, [
                'label' => 'Téléphone de l\'établissement',
                
            ])
        
            ->add('emailEtablissement', TextType::class, [
                'label' => 'Adresse e-mail de l\'établissement',
                
            ])
        
            ->add('responsableEtablissement', TextType::class, [
                'label' => 'Responsable de l\'établissement',
                
            ])
        
            ->add('numeroEtablissement', TextType::class, [
                'label' => 'Numéro de l\'établissement',
                
            ])
        
            ->add('rueEtablissement', TextType::class, [
                'label' => 'Rue de l\'établissement',
                
            ])
        
            ->add('villeEtablissement', TextType::class, [
                'label' => 'Ville de l\'établissement',
                
            ])
            
            ->add('submit', SubmitType::class, [ 'label' => 'Valider']);
      
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Etablisement'
            
        ));
    }
}