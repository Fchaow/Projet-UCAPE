<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passer
 *
 * @ORM\Table(name="passer", indexes={@ORM\Index(name="Eid_langue_passer", columns={"Eid_langue_passer"}), @ORM\Index(name="Eid_examinateur", columns={"Eid_examinateur"}), @ORM\Index(name="Eid_eleve_passer", columns={"Eid_eleve_passer"})})
 * @ORM\Entity
 */
class Passer
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_passer", type="date", nullable=false)
     */
    private $datePasser;

    /**
     * @var float
     *
     * @ORM\Column(name="note_passer", type="float", precision=10, scale=0, nullable=false)
     */
    private $notePasser;

    /**
     * @var string
     *
     * @ORM\Column(name="appreciation_passer", type="text", length=65535, nullable=false)
     */
    private $appreciationPasser;

    /**
     * @var \AppBundle\Entity\Eleve
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Eleve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eid_eleve_passer", referencedColumnName="id_eleve")
     * })
     */
    private $eidElevePasser;

    /**
     * @var \AppBundle\Entity\Examinateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Examinateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eid_examinateur", referencedColumnName="id_examinateur")
     * })
     */
    private $eidExaminateur;

    /**
     * @var \AppBundle\Entity\Langue
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Langue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eid_langue_passer", referencedColumnName="id_langue")
     * })
     */
    private $eidLanguePasser;
    
    /**
     * Get datePasser
     *
     * @return date
     */
    
    public function getDatePasser()
    {
        return $this->datePasser;
    }
    
    /**
     * Set datePasser
     *
     * @param date datePasser
     *
     * @return Passer
     *
     */
    
    public function setDatePasser($datePasser)
    {
        $this->datePasser = $datePasser;
        
        return $this;
    }
    
    /**
     * Get notePasser
     *
     * @return float
     */
    
    public function getNotePasser()
    {
        return $this->notePasser;
    }
    
    /**
     * Set notePasser
     *
     * @param int notePasser
     *
     * @return Passer
     *
     */
    
    public function setNotePasser($notePasser)
    {
        $this->notePasser = $notePasser;
        
        return $this;
    }
    
    /**
     * Get appreciationPasser
     *
     * @return string
     */
    
    public function getAppreciationPasser()
    {
        return $this->appreciationPasser;
    }
    
    /**
     * Set appreciationPasser
     *
     * @param string appreciationPasser
     *
     * @return Passer
     *
     */
    
    public function setAppreciationPasser($appreciationPasser)
    {
        $this->appreciationPasser = $appreciationPasser;
        
        return $this;
    }


}

