<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parametre
 *
 * @ORM\Table(name="parametre")
 * @ORM\Entity
 */
class Parametre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="annee_promo_para", type="integer", nullable=false)
     */
    private $anneePromoPara;

    /**
     * @var string
     *
     * @ORM\Column(name="theme_europe_promo_para", type="string", length=50, nullable=false)
     */
    private $themeEuropePromoPara;

    /**
     * @var string
     *
     * @ORM\Column(name="chemin_DSP_para", type="string", length=50, nullable=false)
     */
    private $cheminDspPara;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_para", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPara;


}

