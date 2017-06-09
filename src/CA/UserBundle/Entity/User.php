<?php
// src/CA/UserBundle/Entity/User.php

namespace CA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Table(name="ca_user")
 * @ORM\Entity(repositoryClass="CAUserBundle\Repository\UserRepository")
 * @ORM\Entity
 */
class User extends BaseUser
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
  /**
   * @var string
   *
   * @ORM\Column(name="nom", type="string", length=255)
  */
  protected $nom;
  
  /**
   * @var string
   *
   * @ORM\Column(name="prenom", type="string", length=255)
  */
  protected $prenom;
  
  /**
   * @var integer
   *
   * @ORM\Column(name="interphone", type="integer", length=255)
  */
  protected $interphone;
  
  /**
   * @var string
   *
   * @ORM\Column(name="telephone", type="string", length=255)
  */
  protected $telephone;
    
  /**
   * @ORM\ManyToOne(targetEntity="CA\UserBundle\Entity\Organigramme", cascade={"persist"})
   * @ORM\JoinColumn(nullable=true)
   */
  protected $position;

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set position
     *
     * @param \CA\UserBundle\Entity\Organigramme $position
     *
     * @return User
     */
    public function setPosition(\CA\UserBundle\Entity\Organigramme $position = null)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \CA\UserBundle\Entity\Organigramme
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set interphone
     *
     * @param integer $interphone
     *
     * @return User
     */
    public function setInterphone($interphone)
    {
        $this->interphone = $interphone;

        return $this;
    }

    /**
     * Get interphone
     *
     * @return integer
     */
    public function getInterphone()
    {
        return $this->interphone;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
}
