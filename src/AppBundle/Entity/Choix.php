<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Choix
 *
 * @ORM\Table(name="choix")
 * @ORM\Entity
 */
class Choix
{
/**
     * @var \AppBundle\Entity\Pays
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eid_pays_choix", referencedColumnName="id_pays")
     * })
     */
    private $eidPaysChoix;

    /**
     * @var \AppBundle\Entity\Eleve
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Eleve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eid_eleve_choix", referencedColumnName="id_eleve")
     * })
     */
    private $eidEleveChoix;
}