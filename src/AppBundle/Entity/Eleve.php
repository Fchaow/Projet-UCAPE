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
    private $nomEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_eleve", type="string", length=50, nullable=false)
     */
    private $prenomEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe_eleve", type="string", length=50, nullable=false)
     */
    private $sexeEleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naiss_eleve", type="date", nullable=false)
     */
    private $dateNaissEleve;

    /**
     * @var integer
     *
     * @ORM\Column(name="promo_eleve", type="integer", nullable=false)
     */
    private $promoEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="email_eleve", type="string", length=50, nullable=false)
     */
    private $emailEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="email_parent_eleve", type="string", length=50, nullable=false)
     */
    private $emailParentEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe_eleve", type="string", length=50, nullable=false)
     */
    private $motDePasseEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires_general_eleve", type="text", length=65535, nullable=false)
     */
    private $commentairesGeneralEleve;

    /**
     * @var boolean
     *
     * @ORM\Column(name="terre_des_langues_eleve", type="boolean", nullable=false)
     */
    private $terreDesLanguesEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires_choix_eleve", type="text", length=65535, nullable=false)
     */
    private $commentairesChoixEleve;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visa_parent_eleve", type="boolean", nullable=false)
     */
    private $visaParentEleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UE2_date_eleve", type="date", nullable=false)
     */
    private $ue2DateEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="UE2_theme_dossier_eleve", type="string", length=50, nullable=false)
     */
    private $ue2ThemeDossierEleve;

    /**
     * @var float
     *
     * @ORM\Column(name="UE2_note_eleve", type="float", precision=10, scale=0, nullable=false)
     */
    private $ue2NoteEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="UE2_appreciations_eleve", type="text", length=65535, nullable=false)
     */
    private $ue2AppreciationsEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="type_eleve", type="string", length=1, nullable=false)
     */
    private $typeEleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UE1_date_ucape", type="date", nullable=true)
     */
    private $ue1DateUcape;

    /**
     * @var float
     *
     * @ORM\Column(name="UE1_note_ucape", type="float", precision=10, scale=0, nullable=true)
     */
    private $ue1NoteUcape;

    /**
     * @var string
     *
     * @ORM\Column(name="UE1_appreciations_ucape", type="text", length=65535, nullable=true)
     */
    private $ue1AppreciationsUcape;

    /**
     * @var boolean
     *
     * @ORM\Column(name="obtention_diplome_ucape", type="boolean", nullable=true)
     */
    private $obtentionDiplomeUcape;

    /**
     * @var string
     *
     * @ORM\Column(name="mention_ucape", type="string", length=50, nullable=true)
     */
    private $mentionUcape;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires_ucape", type="text", length=65535, nullable=true)
     */
    private $commentairesUcape;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_eleve", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEleve;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Classe", mappedBy="eidEleveAppartenir")
     */
    private $eidClasse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Pays", mappedBy="eidEleveChoix")
     */
    private $eidPaysChoix;

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
    private $eidEtablissement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eidClasse = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eidPaysChoix = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eidEtablissement = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

