<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity
 */
class Eleve
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_eleve", type="string", length=50, nullable=false)
     */
    public $nomEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_eleve", type="string", length=50, nullable=false)
     */
    public $prenomEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe_eleve", type="string", length=50, nullable=false)
     */
    public $sexeEleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naiss_eleve", type="date", nullable=false)
     */
    public $dateNaissEleve;

    /**
     * @var integer
     *
     * @ORM\Column(name="promo_eleve", type="integer", nullable=false)
     */
    public $promoEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="email_eleve", type="string", length=50, nullable=false)
     */
    public $emailEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="email_parent_eleve", type="string", length=50, nullable=false)
     */
    public $emailParentEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe_eleve", type="string", length=50, nullable=false)
     */
    public $motDePasseEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires_general_eleve", type="text", length=65535, nullable=false)
     */
    public $commentairesGeneralEleve;

    /**
     * @var boolean
     *
     * @ORM\Column(name="terre_des_langues_eleve", type="boolean", nullable=false)
     */
    public $terreDesLanguesEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires_choix_eleve", type="text", length=65535, nullable=false)
     */
    public $commentairesChoixEleve;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visa_parent_eleve", type="boolean", nullable=false)
     */
    public $visaParentEleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UE2_date_eleve", type="date", nullable=false)
     */
    public $ue2DateEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="UE2_theme_dossier_eleve", type="string", length=50, nullable=false)
     */
    public $ue2ThemeDossierEleve;

    /**
     * @var float
     *
     * @ORM\Column(name="UE2_note_eleve", type="float", precision=10, scale=0, nullable=false)
     */
    public $ue2NoteEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="UE2_appreciations_eleve", type="text", length=65535, nullable=false)
     */
    public $ue2AppreciationsEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="type_eleve", type="string", length=1, nullable=false)
     */
    public $typeEleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UE1_date_ucape", type="date", nullable=true)
     */
    public $ue1DateUcape;

    /**
     * @var float
     *
     * @ORM\Column(name="UE1_note_ucape", type="float", precision=10, scale=0, nullable=true)
     */
    public $ue1NoteUcape;

    /**
     * @var string
     *
     * @ORM\Column(name="UE1_appreciations_ucape", type="text", length=65535, nullable=true)
     */
    public $ue1AppreciationsUcape;

    /**
     * @var boolean
     *
     * @ORM\Column(name="obtention_diplome_ucape", type="boolean", nullable=true)
     */
    public $obtentionDiplomeUcape;

    /**
     * @var string
     *
     * @ORM\Column(name="mention_ucape", type="string", length=50, nullable=true)
     */
    public $mentionUcape;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires_ucape", type="text", length=65535, nullable=true)
     */
    public $commentairesUcape;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_eleve", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idEleve;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Eleve", mappedBy="eidEleveAppartenir")
     */
    public $eidClasse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Pays", mappedBy="eidEleveChoix")
     */
    public $eidPaysChoix;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Etablisement", inversedBy="eidEleveProposition")
     * @ORM\JoinTable(name="proposition",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Eid_eleve_proposition", referencedColumnName="id_eleve")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Eid_etablissement", referencedColumnName="id_etablissement")
     *   }
     * )
     */
    public $eidEtablissement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eidClasse = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eidPaysChoix = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eidEtablissement = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function getIdEleve()
    {
        return $this->idEleve;
    }
    /**
     * Set commentairesUcape
     *
     * @param string $commentairesUcape
     *
     * @return Eleve
     */
    public function setCommentairesUcape($commentairesUcape)
    {
        $this->commentairesUcape = $commentairesUcape;

        return $this;
    }

    /**
     * Get commentairesUcape
     *
     * @return string
     */
    public function getCommentairesUcape()
    {
        return $this->commentairesUcape;
    }
        /**
     * Set mentionUcape
     *
     * @param string $mentionUcape
     *
     * @return Eleve
     */
    public function setMentionUcape($mentionUcape)
    {
        $this->mentionUcape = $mentionUcape;

        return $this;
    }
    /**
     * Get mentionUcape
     *
     * @return string
     */
    public function getMentionUcape()
    {
        return $this->mentionUcape;
    }
    /**
     * Set obtentionDiplomeUcape
     *
     * @param boolean $obtentionDiplomeUcape
     *
     * @return Eleve
     */
    public function setObtentionDiplomeUcape($obtentionDiplomeUcape)
    {
        $this->obtentionDiplomeUcape = $obtentionDiplomeUcape;

        return $this;
    }

    /**
     * Get obtentionDiplomeUcape
     *
     * @return boolean
     */
    public function getObtentionDiplomeUcape()
    {
        return $this->obtentionDiplomeUcape;
    }
    /**
     * Set ue1AppreciationsUcape
     *
     * @param string $ue1AppreciationsUcape
     *
     * @return Eleve
     */
    public function setUe1AppreciationsUcape($ue1AppreciationsUcape)
    {
        $this->ue1AppreciationsUcape = $ue1AppreciationsUcape;

        return $this;
    }

    /**
     * Get ue1AppreciationsUcape
     *
     * @return string
     */
    public function getUe1AppreciationsUcape()
    {
        return $this->ue1AppreciationsUcape;
    }
        /**
     * Set ue1NoteUcape
     *
     * @param float $ue1NoteUcape
     *
     * @return Eleve
     */
    public function setUe1NoteUcape($ue1NoteUcape)
    {
        $this->ue1NoteUcape = $ue1NoteUcape;

        return $this;
    }

    /**
     * Get ue1NoteUcape
     *
     * @return float
     */
    public function getUe1NoteUcape()
    {
        return $this->ue1NoteUcape;
    }
    /**
     * Set ue1DateUcape
     *
     * @param \DateTime $ue1DateUcape
     *
     * @return Eleve
     */
    public function setUe1DateUcape($ue1DateUcape)
    {
        $this->ue1DateUcape = $ue1DateUcape;

        return $this;
    }

    /**
     * Get ue1DateUcape
     *
     * @return \DateTime
     */
    public function getUe1DateUcape()
    {
        return $this->ue1DateUcape;
    }
    /**
     * Set commentairesUcape
     *
     * @param string $commentairesUcape
     *
     * @return Eleve
     */
    public function setTypeEleve($typeEleve)
    {
        $this->typeEleve = $typeEleve;

        return $this;
    }

    /**
     * Get typeEleve
     *
     * @return string
     */
    public function getTypeEleve()
    {
        return $this->typeEleve;
    }
    /**
     * Set ue2AppreciationsEleve
     *
     * @param string $ue2AppreciationsEleve
     *
     * @return Eleve
     */
    public function setUe2AppreciationsEleve($ue2AppreciationsEleve)
    {
        $this->ue2AppreciationsEleve = $ue2AppreciationsEleve;

        return $this;
    }

    /**
     * Get ue2AppreciationsEleve
     *
     * @return string
     */
    public function getUe2AppreciationsEleve()
    {
        return $this->ue2AppreciationsEleve;
    }
    /**
     * Set ue2NoteEleve
     *
     * @param float $ue2NoteEleve
     *
     * @return Eleve
     */
    public function setUe2NoteEleve($ue2NoteEleve)
    {
        $this->ue2NoteEleve = $ue2NoteEleve;

        return $this;
    }

    /**
     * Get ue2NoteEleve
     *
     * @return float
     */
    public function getUe2NoteEleve()
    {
        return $this->ue2NoteEleve;
    }
    /**
     * Set ue2ThemeDossierEleve
     *
     * @param string $ue2ThemeDossierEleve
     *
     * @return Eleve
     */
    public function setUe2ThemeDossierEleve($ue2ThemeDossierEleve)
    {
        $this->ue2ThemeDossierEleve = $ue2ThemeDossierEleve;

        return $this;
    }

    /**
     * Get ue2ThemeDossierEleve
     *
     * @return string
     */
    public function getUe2ThemeDossierEleve()
    {
        return $this->ue2ThemeDossierEleve;
    }
    /**
     * Set ue2DateEleve
     *
     * @param \DateTime $ue2DateEleve
     *
     * @return Eleve
     */
    public function setUe2DateEleve($ue2DateEleve)
    {
        $this->ue2DateEleve = $ue2DateEleve;

        return $this;
    }

    /**
     * Get ue2DateEleve
     *
     * @return \DateTime
     */
    public function getUe2DateEleve()
    {
        return $this->ue2DateEleve;
    }
    /**
     * Set visaParentEleve
     *
     * @param boolean $visaParentEleve
     *
     * @return Eleve
     */
    public function setVisaParentEleve($visaParentEleve)
    {
        $this->visaParentEleve = $visaParentEleve;

        return $this;
    }

    /**
     * Get visaParentEleve
     *
     * @return boolean
     */
    public function getVisaParentEleve()
    {
        return $this->visaParentEleve;
    }
    /**
     * Set commentairesChoixEleve
     *
     * @param string $commentairesChoixEleve
     *
     * @return Eleve
     */
    public function setCommentairesChoixEleve($commentairesChoixEleve)
    {
        $this->commentairesChoixEleve = $commentairesChoixEleve;

        return $this;
    }

    /**
     * Get commentairesChoixEleve
     *
     * @return string
     */
    public function getCommentairesChoixEleve()
    {
        return $this->commentairesChoixEleve;
    }
    /**
     * Set terreDesLanguesEleve
     *
     * @param boolean $terreDesLanguesEleve
     *
     * @return Eleve
     */
    public function setTerreDesLanguesEleve($terreDesLanguesEleve)
    {
        $this->terreDesLanguesEleve = $terreDesLanguesEleve;

        return $this;
    }

    /**
     * Get terreDesLanguesEleve
     *
     * @return boolean
     */
    public function getTerreDesLanguesEleve()
    {
        return $this->terreDesLanguesEleve;
    }
    /**
     * Set commentairesGeneralEleve
     *
     * @param string $commentairesGeneralEleve
     *
     * @return Eleve
     */
    public function setCommentairesGeneralEleve($commentairesGeneralEleve)
    {
        $this->commentairesGeneralEleve = $commentairesGeneralEleve;

        return $this;
    }

    /**
     * Get commentairesGeneralEleve
     *
     * @return string
     */
    public function getCommentairesGeneralEleve()
    {
        return $this->commentairesGeneralEleve;
    }
    /**
     * Set motDePasseEleve
     *
     * @param string $motDePasseEleve
     *
     * @return Eleve
     */
    public function setMotDePasseEleve($motDePasseEleve)
    {
        $this->motDePasseEleve = $motDePasseEleve;

        return $this;
    }

    /**
     * Get motDePasseEleve
     *
     * @return string
     */
    public function getMotDePasseEleve()
    {
        return $this->motDePasseEleve;
    }
    /**
     * Set emailParentEleve
     *
     * @param string $emailParentEleve
     *
     * @return Eleve
     */
    public function setEmailParentEleve($emailParentEleve)
    {
        $this->emailParentEleve = $emailParentEleve;

        return $this;
    }

    /**
     * Get emailParentEleve
     *
     * @return string
     */
    public function getEmailParentEleve()
    {
        return $this->emailParentEleve;
    }
    /**
     * Set emailEleve
     *
     * @param string $emailEleve
     *
     * @return Eleve
     */
    public function setEmailEleve($emailEleve)
    {
        $this->emailEleve = $emailEleve;

        return $this;
    }

    /**
     * Get emailEleve
     *
     * @return string
     */
    public function getEmailEleve()
    {
        return $this->emailEleve;
    }
    /**
     * Set promoEleve
     *
     * @param integer $promoEleve
     *
     * @return Eleve
     */
    public function setPromoEleve($promoEleve)
    {
        $this->promoEleve = $promoEleve;

        return $this;
    }

    /**
     * Get promoEleve
     *
     * @return integer
     */
    public function getPromoEleve()
    {
        return $this->promoEleve;
    }
    /**
     * Set dateNaissEleve
     *
     * @param \DateTime $dateNaissEleve
     *
     * @return Eleve
     */
    public function setDateNaissEleve($dateNaissEleve)
    {
        $this->dateNaissEleve = $dateNaissEleve;

        return $this;
    }

    /**
     * Get dateNaissEleve
     *
     * @return \DateTime
     */
    public function getDateNaissEleve()
    {
        return $this->dateNaissEleve;
    }
    /**
     * Set sexeEleve
     *
     * @param string $sexeEleve
     *
     * @return Eleve
     */
    public function setSexeEleve($sexeEleve)
    {
        $this->sexeEleve = $sexeEleve;

        return $this;
    }

    /**
     * Get commentairesUcape
     *
     * @return string
     */
    public function getSexeEleve()
    {
        return $this->sexeEleve;
    }
    /**
     * Set prenomEleve
     *
     * @param string $prenomEleve
     *
     * @return Eleve
     */
    public function setPrenomEleve($prenomEleve)
    {
        $this->prenomEleve = $prenomEleve;

        return $this;
    }

    /**
     * Get prenomEleve
     *
     * @return string
     */
    public function getPrenomEleve()
    {
        return $this->prenomEleve;
    }
    /**
     * Set nomEleve
     *
     * @param string $nomEleve
     *
     * @return Eleve
     */
    public function setNomEleve($nomEleve)
    {
        $this->nomEleve = $nomEleve;

        return $this;
    }

    /**
     * Get nomEleve
     *
     * @return string
     */
    public function getNomEleve()
    {
        return $this->nomEleve;
    }
}

