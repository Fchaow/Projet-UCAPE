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
    private $libelleEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_etablissement", type="string", length=50, nullable=false)
     */
    private $nomEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_etablissement", type="string", length=50, nullable=false)
     */
    private $telEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="email_etablissement", type="string", length=50, nullable=false)
     */
    private $emailEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_etablissement", type="string", length=50, nullable=false)
     */
    private $responsableEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_etablissement", type="string", length=50, nullable=false)
     */
    private $numeroEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="rue_etablissement", type="string", length=50, nullable=false)
     */
    private $rueEtablissement;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_etablissement", type="string", length=50, nullable=false)
     */
    private $villeEtablissement;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_etablissement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEtablissement;

    /**
     * @var \AppBundle\Entity\Pays
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eid_pays", referencedColumnName="id_pays")
     * })
     */
    private $eidPays;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Eleve", mappedBy="eidEtablissement")
     */
    private $eidEleveProposition;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eidEleveProposition = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

