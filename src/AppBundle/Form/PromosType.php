<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PromosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anneePromo', IntegerType::class, [
                    'label' => 'Année de la promotion',
                    'required'   => true,
                ])
        
            ->add('themeEuropePromo', TextType::class, [
                'label' => 'Thème pour cette promotion',
                'required'   => true,
            ])
        
            ->add('cheminDSPPromo', TextType::class, [
                'label' => 'Chemin d\'accès pour la promotion',
                'empty_data' => 'Chemin/Promos/',
                'required'   => true,
            ])
            
            ->add('submit', SubmitType::class, [ 'label' => 'Valider']);
      
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Promotion',
            'is_edit' => false
        ));
    }
}