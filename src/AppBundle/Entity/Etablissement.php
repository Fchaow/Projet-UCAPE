<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement", indexes={@ORM\Index(name="Eid_pays", columns={"Eid_pays"})})
 * @ORM\Entity
 */
class Etablissement
{
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
     * @var int
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
    /**
     * Get idEtablissement
     *
     * @return int
     */
    public function getIdEtablissement()
    {
        return $this->idEtablissement;
    }
    /**
     * Set villeEtablissement
     *
     * @param string $villeEtablissement
     *
     * @return Etablisement
     */
    public function setVilleEtablissement($villeEtablissement)
    {
        $this->villeEtablissement = $villeEtablissement;

        return $this;
    }

    /**
     * Get villeEtablissement
     *
     * @return string
     */
    public function getVilleEtablissement()
    {
        return $this->villeEtablissement;
    }
    /**
     * Set rueEtablissement
     *
     * @param string $rueEtablissement
     *
     * @return Etablisement
     */
    public function setRueEtablissement($rueEtablissement)
    {
        $this->rueEtablissement = $rueEtablissement;

        return $this;
    }

    /**
     * Get rueEtablissement
     *
     * @return string
     */
    public function getRueEtablissement()
    {
        return $this->rueEtablissement;
    }
    /**
     * Set numeroEtablissement
     *
     * @param string $numeroEtablissement
     *
     * @return Etablisement
     */
    public function setNumeroEtablissement($numeroEtablissement)
    {
        $this->numeroEtablissement = $numeroEtablissement;

        return $this;
    }

    /**
     * Get numeroEtablissement
     *
     * @return string
     */
    public function getNumeroEtablissement()
    {
        return $this->numeroEtablissement;
    }
    /**
     * Set responsableEtablissement
     *
     * @param string $responsableEtablissement
     *
     * @return Etablisement
     */
    public function setResponsableEtablissement($responsableEtablissement)
    {
        $this->responsableEtablissement = $responsableEtablissement;

        return $this;
    }

    /**
     * Get responsableEtablissement
     *
     * @return string
     */
    public function getResponsableEtablissement()
    {
        return $this->responsableEtablissement;
    }
    /**
     * Set emailEtablissement
     *
     * @param string $emailEtablissement
     *
     * @return Etablisement
     */
    public function setEmailEtablissement($emailEtablissement)
    {
        $this->emailEtablissement = $emailEtablissement;

        return $this;
    }

    /**
     * Get emailEtablissement
     *
     * @return string
     */
    public function getEmailEtablissement()
    {
        return $this->emailEtablissement;
    }
    /**
     * Set telEtablissement
     *
     * @param string $telEtablissement
     *
     * @return Etablisement
     */
    public function setTelEtablissement($telEtablissement)
    {
        $this->telEtablissement = $telEtablissement;

        return $this;
    }

    /**
     * Get telEtablissement
     *
     * @return string
     */
    public function getTelEtablissement()
    {
        return $this->telEtablissement;
    }
    /**
     * Set nomEtablissement
     *
     * @param string $nomEtablissement
     *
     * @return Etablisement
     */
    public function setNomEtablissement($nomEtablissement)
    {
        $this->nomEtablissement = $nomEtablissement;

        return $this;
    }

    /**
     * Get nomEtablissement
     *
     * @return string
     */
    public function getNomEtablissement()
    {
        return $this->nomEtablissement;
    }
    /**
     * Set libelleEtablissement
     *
     * @param string $libelleEtablissement
     *
     * @return Etablisement
     */
    public function setLibelleEtablissement($libelleEtablissement)
    {
        $this->libelleEtablissement = $libelleEtablissement;

        return $this;
    }

    /**
     * Get libelleEtablissement
     *
     * @return string
     */
    public function getLibelleEtablissement()
    {
        return $this->libelleEtablissement;
    }

}
