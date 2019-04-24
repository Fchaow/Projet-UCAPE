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
use AppBundle\Entity\Eleve;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEleve', TextType::class, [
                'label' => 'Nom de l\'élève',
            ])
            ->add('prenomEleve', TextType::class, [
                'label' => 'Prenom de l\'élève',
            ])
            ->add('sexeEleve', TextType::class, [
                'label' => 'Sexe de l\'élève',
            ])
            ->add('dateNaissEleve', DateType::class, [
                'label' => 'Date de Naissance de l\'élève',
            ])
            ->add('promoEleve', IntegerType::class, [
                'label' => 'Promotion de l\'élève',
            ])
            
            ->add('emailEleve', TextType::class, [
                'label' => 'Adresse e-mail de l\'élève',
            ])
            
            ->add('emailParentEleve', TextType::class, [
                'label' => 'Adresse e-mail du parent de l\'élève',
            ])
            
            ->add('submit', SubmitType::class, [ 'label' => 'Valider']);
    
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Eleve'
        ));
    }
}