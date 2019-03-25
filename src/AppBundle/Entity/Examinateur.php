<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examinateur
 *
 * @ORM\Table(name="examinateur", indexes={@ORM\Index(name="Eid_langue_examinateur", columns={"Eid_langue_examinateur"})})
 * @ORM\Entity
 */
class Examinateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_examinateur", type="string", length=50, nullable=false)
     */
    private $nomExaminateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_examinateur", type="string", length=50, nullable=false)
     */
    private $prenomExaminateur;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_examinateur", type="string", length=50, nullable=false)
     */
    private $telephoneExaminateur;

    /**
     * @var int
     *
     * @ORM\Column(name="id_examinateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExaminateur;

    /**
     * @var \AppBundle\Entity\Langue
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Langue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eid_langue_examinateur", referencedColumnName="id_langue")
     * })
     */
    private $eidLangueExaminateur;
    
    /**
     * Get nomExaminateur
     *
     * @return string
     */
    
    public function getNomExaminateur()
    {
        return $this->nomExaminateur;
    }
    
    /**
     * Set nomExaminateur
     *
     * @param string nomExaminateur
     *
     * @return Examinateur
     *
     */
    
    public function setNomExaminateur($nomExaminateur)
    {
        $this->nomExaminateur = $nomExaminateur;
        
        return $this;
    }
    
    /**
     * Get nomExaminateur
     *
     * @return string
     */
    
    public function getPrenomExaminateur()
    {
        return $this->prenomExaminateur;
    }
    
    /**
     * Set prenomExaminateur
     *
     * @param string prenomExaminateur
     *
     * @return Examinateur
     *
     */
    
    public function setPrenomExaminateur($prenomExaminateur)
    {
        $this->prenomExaminateur = $prenomExaminateur;
        
        return $this;
    }
    
    /**
     * Get telephoneExaminateur
     *
     * @return string
     */
    
    public function getTelephoneExaminateur()
    {
        return $this->telephoneExaminateur;
    }
    
    /**
     * Set telephoneExaminateur
     *
     * @param string telephoneExaminateur
     *
     * @return Examinateur
     *
     */
    
    public function setTelephoneExaminateur($telephoneExaminateur)
    {
        $this->telephoneExaminateur = $telephoneExaminateur;
        
        return $this;
    }
    
    /**
     * Get idExaminateur
     *
     * @return int
     */
    
    public function getIdExaminateur()
    {
        return $this->idExaminateur;
    }
    
    /**
     * Set idExaminateur
     *
     * @param int idExaminateur
     *
     * @return Examinateur
     *
     */
    
    public function setIdExaminateur($idExaminateur)
    {
        $this->idExaminateur = $idExaminateur;
        
        return $this;
    }

}
