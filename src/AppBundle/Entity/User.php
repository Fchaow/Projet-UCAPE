<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * Get id
     *
     * @return int
     *
     */
    
    public function getId()
    {
        return $this->id;
    }
    
    /**
     *
     * Set id
     *
     * @param int id
     *
     * @return BaseUser
     */
    
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
       
}
