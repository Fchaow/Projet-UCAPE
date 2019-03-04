<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablisement
 *
 * @ORM\Table(name="etablisement", indexes={@ORM\Index(name="Eid_pays", columns={"Eid_pays"})})
 * @ORM\Entity
 */
class Etablisement
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelle_etablissement", type="string", length=50, nullable=false)
     */
    public $libelleEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_etablissement", type="string", length=50, nullable=false)
     */
    public $nomEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_etablissement", type="string", length=50, nullable=false)
     */
    public $telEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="email_etablissement", type="string", length=50, nullable=false)
     */
    public $emailEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_etablissement", type="string", length=50, nullable=false)
     */
    public $responsableEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_etablissement", type="string", length=50, nullable=false)
     */
    public $numeroEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="rue_etablissement", type="string", length=50, nullable=false)
     */
    public $rueEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_etablissement", type="string", length=50, nullable=false)
     */
    public $villeEtablissement;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_etablissement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idEtablissement;

    /**
     * @var \AppBundle\Entity\Pays
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eid_pays", referencedColumnName="id_pays")
     * })
     */
    public $eidPays;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Eleve", mappedBy="eidEtablissement")
     */
    public $eidEleveProposition;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eidEleveProposition = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

