<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Pays;
use AppBundle\Entity\Classe;
use AppBundle\Entity\Eleve;
use AppBundle\Entity\Etablissement;
use AppBundle\Entity\Examinateur;
use AppBundle\Entity\Langue;
use AppBundle\Entity\Parametre;
use AppBundle\Entity\Passer;
use AppBundle\Entity\User;
use Faker;


class AppFixtures implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) 
        {
            $pays = new Pays();
            $pays->setLibellePays($faker->country);
            $manager->persist($pays);
        }
        $lesClasses = [
            '2nde 1',
            '2nde 2',
            '2nde 3',
            '2nde 4',
            '2nde 5',
            '2nde 6',
            '2nde 7',
            '1ere STMG',
            '1ere ST2S',
            '1ere L',
            '1ere ES1',
            '1ere ES2',
            '1ere S1',
            '1ere S2',
            '1ere S3',
        ];
        for ($i = 0; $i < 15; $i++)
        {
            $classe = new Classe();
            $classe->setLibelleClasse($lesClasses[$i]);
            $manager->persist($classe);
        }
        for ($i = 0; $i < 100; $i++)
        {
            $eleve = new Eleve();
            $eleve->setNomEleve($faker->lastName);
            $eleve->setPrenomEleve($faker->firstName);
            $eleve->setSexeEleve($faker->randomElement($array = array ('H','F')));
            $eleve->setDateNaissEleve($faker->datetime);
            $eleve->setPromoEleve($faker->numberBetween($min = 1999, $max = 2003));
            $eleve->setEmailEleve($faker->email);
            $eleve->setEmailParentEleve($faker->email);
            $eleve->setMotDePasseEleve($faker->password);
            $eleve->setCommentairesGeneralEleve($faker->sentence($nbWords = 6, $variableNbWords = true));
            $eleve->setTerreDesLanguesEleve($faker->boolean($chanceOfGettingTrue = 50));
            $eleve->setCommentairesChoixEleve($faker->sentence($nbWords = 6, $variableNbWords = true));
            $eleve->setVisaParentEleve($faker->boolean($chanceOfGettingTrue = 50));
            $eleve->setUe2DateEleve($faker->datetime);
            $eleve->setUe2ThemeDossierEleve($faker->word);
            $eleve->setUe2NoteEleve($faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 20));
            $eleve->setUe2AppreciationsEleve($faker->sentence($nbWords = 6, $variableNbWords = true));
            $eleve->setTypeEleve($faker->boolean($chanceOfGettingTrue = 50));
            $eleve->setUe1DateUcape($faker->datetime);
            $eleve->setUe1NoteUcape($faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 20));
            $eleve->setUe1AppreciationsUcape($faker->sentence($nbWords = 6, $variableNbWords = true));
            $eleve->setObtentionDiplomeUcape($faker->boolean($chanceOfGettingTrue = 50));
            $eleve->setMentionUcape($faker->word);
            $eleve->setCommentairesUcape($faker->sentence($nbWords = 6, $variableNbWords = true));
            $manager->persist($eleve);
        }
        for ($i = 0; $i < 10; $i++) 
        {
            $etablissement = new Etablissement();
            $etablissement->setNomEtablissement($faker->company);
            $etablissement->setTelEtablissement($faker->phoneNumber);
            $etablissement->setEmailEtablissement($faker->email);
            $etablissement->setResponsableEtablissement($faker->firstName);
            $etablissement->setNumeroEtablissement($faker->building_number);
            $etablissement->setRueEtablissement($faker->street_address);
            $etablissement->setVilleEtablissement($faker->city_suffix);
            $manager->persist($etablissement);
        }
        for ($i = 0; $i < 20; $i++)
        {
            $examinateur = new Examinateur();
            $examinateur->setNomExaminateur($faker->lastName);
            $examinateur->setPrenomExaminateur($faker->firstName);
            $examinateur->setTelephoneExaminateur($faker->phoneNumber);
            $manager->persist($examinateur);
        }
        for ($i = 0; $i < 20; $i++)
        {
            $langue = new Langue();
            $langue->setLibelleLangue($faker->bank_country);
            $manager->persist($langue);
        }
        $lesChemins = [
            'Chemin/Promos/2014',
            'Chemin/Promos/2013',
            'Chemin/Promos/2012',
            'Chemin/Promos/2011',
            'Chemin/Promos/2010',
            'Chemin/Promos/2009',
            'Chemin/Promos/2008',
            'Chemin/Promos/2007',
            'Chemin/Promos/2006',
            'Chemin/Promos/2005',
            'Chemin/Promos/2004',
            'Chemin/Promos/2003',
            'Chemin/Promos/2002',
            'Chemin/Promos/2001',
            'Chemin/Promos/2000',
            'Chemin/Promos/1999',
            'Chemin/Promos/1998',
            'Chemin/Promos/1997',
            'Chemin/Promos/1996',
            'Chemin/Promos/1995'
        ];
        for ($i = 0; $i < 20; $i++)
        {
            $parametre = new Parametre();
            $parametre->setAnneePromoPara($faker->year);
            $parametre->setThemeEuropePromoPara($faker->catch_phrase_noun);
            $parametre->setCheminDspPara($lesChemins[$i]);
            $manager->persist($parametre);
        }
        for ($i = 0; $i < 20; $i++)
        {
            $passer = new Passer();
            $passer->setDatePasser($faker->year);
            $passer->setNotePasser($faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 20));
            $passer->setAppreciationPasser($faker->catch_phrase);
            $manager->persist($passer);
        }
            $eleve_uti = new User();
            $eleve_uti->
            $eleve_uti->motDePasseUtilisateur('user');
            $manager->persist($eleve_uti);
        for ($i = 0; $i <20; $i++)
            $admin_uti = new User();
            $admin_uti->setUsername('admin');
            $admin_uti->setEmail('admin.admin@gmail.com');
            $admin_uti->setPassword('admin');
            $admin_uti->setEnabled(true);
            $admin_uti->setRoles(array("ROLE_ADMIN"));
            $manager->persist($admin_uti);
        $manager->flush();
    }
}
?>