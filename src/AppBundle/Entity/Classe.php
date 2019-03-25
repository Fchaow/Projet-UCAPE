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
     * @var int
     *
     * @ORM\Column(name="id_classe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClasse;

    public function getIdClasse()
    {
        return $this->idClasse;
    }
    /**
     * Set libelleClasse
     *
     * @param string $libelleClasse
     *
     * @return Classe
     */
    public function setLibelleClasse($libelleClasse)
    {
        $this->libelleClasse = $libelleClasse;

        return $this;
    }

    /**
     * Get libelleClasse
     *
     * @return string
     */
    public function getLibelleClasse()
    {
        return $this->libelleClasse;
    }

}
