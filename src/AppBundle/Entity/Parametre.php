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
    
    /**
     * Get anneePromoPara
     *
     * @return int
     */
    
    public function getAnneePromoPara()
    {
        return $this->anneePromoPara;
    }
    
    /**
     * Set anneePromoPara
     *
     * @param int anneePromoPara
     *
     * @return Parametre
     *
     */
    
    public function setAnneePromoPara($anneePromoPara)
    {
        $this->anneePromoPara = $anneePromoPara;
        
        return $this;
    }
    
    /**
     * Get themeEuropePromoPara
     *
     * @return string
     */
    
    public function getThemeEuropePromoPara()
    {
        return $this->themeEuropePromoPara;
    }
    
    /**
     * Set themeEuropePromoPara
     *
     * @param string themeEuropePromoPara
     *
     * @return Parametre
     *
     */
    
    public function setThemeEuropePromoPara($themeEuropePromoPara)
    {
        $this->themeEuropePromoPara = $themeEuropePromoPara;
        
        return $this;
    }
    
    /**
     * Get cheminDspPara
     *
     * @return string
     */
    
    public function getCheminDspPara()
    {
        return $this->cheminDspPara;
    }
    
    /**
     * Set cheminDspPara
     *
     * @param string cheminDspPara
     *
     * @return Parametre
     *
     */
    
    public function setCheminDspPara($cheminDspPara)
    {
        $this->cheminDspPara = $cheminDspPara;
        
        return $this;
    }
    
    /**
     * Get idPara
     *
     * @return int
     */
    
    public function getIdPara()
    {
        return $this->idPara;
    }
    
    /**
     * Set idPara
     *
     * @param int idPara
     *
     * @return Parametre
     *
     */
    
    public function setIdPara($idPara)
    {
        $this->idPara = $idPara;
        
        return $this;
    }


}

