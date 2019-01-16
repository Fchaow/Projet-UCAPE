<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langue
 *
 * @ORM\Table(name="langue")
 * @ORM\Entity
 */
class Langue
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelle_langue", type="string", length=50, nullable=false)
     */
    private $libelleLangue;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_langue", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLangue;


}

