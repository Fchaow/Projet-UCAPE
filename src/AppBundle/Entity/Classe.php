<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity
 */
class Classe
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelle_classe", type="string", length=50, nullable=false)
     */
    private $libelleClasse;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_classe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClasse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Eleve", inversedBy="eidClasse")
     * @ORM\JoinTable(name="appartenir",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Eid_classe", referencedColumnName="id_classe")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Eid_eleve_appartenir", referencedColumnName="id_eleve")
     *   }
     * )
     */
    private $eidEleveAppartenir;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eidEleveAppartenir = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

