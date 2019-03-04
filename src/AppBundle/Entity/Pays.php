<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity
 */
class Pays
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelle_pays", type="string", length=50, nullable=false)
     */
    private $libellePays;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_pays", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPays;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Eleve", inversedBy="eidPaysChoix")
     * @ORM\JoinTable(name="choix",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Eid_pays_choix", referencedColumnName="id_pays")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Eid_eleve_choix", referencedColumnName="id_eleve")
     *   }
     * )
     */
    private $eidEleveChoix;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eidEleveChoix = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
