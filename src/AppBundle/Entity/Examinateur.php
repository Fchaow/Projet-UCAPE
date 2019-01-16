<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examinateur
 *
 * @ORM\Table(name="examinateur", indexes={@ORM\Index(name="Eid_langue_examinateur", columns={"Eid_langue_examinateur"})})
 * @ORM\Entity
 */
class Examinateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_examinateur", type="string", length=50, nullable=false)
     */
    private $nomExaminateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_examinateur", type="string", length=50, nullable=false)
     */
    private $prenomExaminateur;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_examinateur", type="string", length=50, nullable=false)
     */
    private $telephoneExaminateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_examinateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExaminateur;

    /**
     * @var \AppBundle\Entity\Langue
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Langue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eid_langue_examinateur", referencedColumnName="id_langue")
     * })
     */
    private $eidLangueExaminateur;


}

