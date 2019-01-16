<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="identifiant_utilisateur", type="string", length=50, nullable=false)
     */
    private $identifiantUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe_utilisateur", type="string", length=50, nullable=false)
     */
    private $motDePasseUtilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_utilisateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeUtilisateur;


}

