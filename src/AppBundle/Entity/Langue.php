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
    
    /**
     * Get idLangue
     *
     * @return int
     */
    
    public function getIdLangue()
    {
        return $this->idLangue;
    }
    
    /**
     * Set idLangue
     *
     * @param int idLangue
     *
     * @return Langue
     *
     */
    
    public function setIdLangue($idLangue)
    {
        $this->idLangue = $idLangue;
        
        return $this;
    }
    
    /**
     * Get libelleLangue
     *
     * @return string
     */
    
    public function getLibelleLangue()
    {
        return $this->libelleLangue;
    }
    
    /**
     * Set libelleLangue
     *
     * @param string libelleLangue
     *
     * @return Langue
     *
     */
    
    public function setLibelleLangue($libelleLangue)
    {
        $this->libelleLangue = $libelleLangue;
        
        return $this;
    }


}

