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
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEleve', TextType::class, [
                'label' => 'Nom de l\'élève',
                'required'   => true,
            ])
            ->add('prenomEleve', TextType::class, [
                'label' => 'Prenom de l\'élève',
                'required'   => true,
            ])
            ->add('sexeEleve', TextType::class, [
                'label' => 'Sexe de l\'élève ( H ou F)',
                'required'   => true,
            ])
            ->add('dateNaissEleve', DateType::class, [
                'label' => 'Date de Naissance de l\'élève',
                'required'   => true,
                'years' => range(1990,2100),
            ])
            
            ->add('emailEleve', TextType::class, [
                'label' => 'Adresse e-mail de l\'élève',
                'required'   => true,
            ])

            ->add('motDePasseEleve', TextType::class, [
                'label' => 'mot de passe de l\'élève',
                'required'   => true,
            ])
            
            ->add('emailParentEleve', TextType::class, [
                'label' => 'Adresse e-mail du parent de l\'élève',
                'required'   => true,
            ])

            ->add('commentairesGeneralEleve', TextType::class, [
                'label' => 'Commentaire de l\'élève',
                'required'   => true,
            ])

            ->add('classes', EntityType::class, array(
                'class'        => 'AppBundle\Entity\Classe',
                'choice_label' => 'libelleClasse',
                'multiple'     => false,
                'expanded'     => false,
                'required'   => true,
              ))

              ->add('promotions', EntityType::class, array(
                'class'        => 'AppBundle\Entity\Promotion',
                'choice_label' => 'anneePromo',
                'multiple'     => false,
                'expanded'     => false,
                'required'   => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('promo')
                        ->orderBy('promo.anneePromo', 'desc');
                },
              ))

              ->add('utilisateurId', EntityType::class, array(
                'class'        => 'AppBundle\Entity\User',
                'choice_label' => 'username',
                'multiple'     => false,
                'expanded'     => false,
                'required'   => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('uti')
                        ->orderBy('uti.username', 'asc');
                },
              ))
            
            ->add('submit', SubmitType::class, [ 'label' => 'Valider']);
    
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Eleve',
            'is_edit' => false
        ));
    }
}