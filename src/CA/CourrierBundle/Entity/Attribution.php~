<?php

namespace CA\CourrierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribution
 *
 * @ORM\Table(name="ca_attribution")
 * @ORM\Entity(repositoryClass="CA\CourrierBundle\Repository\AttributionRepository")
 */
class Attribution
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="archived", type="boolean")
     */
    private $archived;

    
    /**
     * @ORM\ManyToOne(targetEntity="CA\CourrierBundle\Entity\Courrier")
     * @ORM\JoinColumn(nullable=false)
     */
    private $courrier;
    
    /**
     * @ORM\ManyToOne(targetEntity="CA\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $attributaire;
    
    /**
     * @ORM\OneToMany(targetEntity="CA\CourrierBundle\Entity\AttributionUser", mappedBy="attribution", cascade={"persist"})
     */
    private $attributionusers;

    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->archived = FALSE;
        
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Attribution
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * Set archived
     *
     * @param boolean $archived
     *
     * @return Attribution
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return bool
     */
    public function getArchived()
    {
        return $this->archived;
    }
    
    /**
     * Set courrier
     *
     * @param \CA\CourrierBundle\Entity\Courrier $courrier
     *
     * @return Attribution
     */
    public function setCourrier(\CA\CourrierBundle\Entity\Courrier $courrier)
    {
        $this->courrier = $courrier;

        return $this;
    }

    /**
     * Get courrier
     *
     * @return \CA\CourrierBundle\Entity\Courrier
     */
    public function getCourrier()
    {
        return $this->courrier;
    }

    /**
     * Set attributaire
     *
     * @param \CA\UserBundle\Entity\User $attributaire
     *
     * @return Attribution
     */
    public function setAttributaire(\CA\UserBundle\Entity\User $attributaire)
    {
        $this->attributaire = $attributaire;

        return $this;
    }

    /**
     * Get attributaire
     *
     * @return \CA\UserBundle\Entity\User
     */
    public function getAttributaire()
    {
        return $this->attributaire;
    }
    
    public function __toString()
    {
      return $this->getAttributaire()->getNom(). ' ' . $this->getAttributaire()->getPrenom(). ' (' . $this->getCourrier()->getNumAttribution(). ')'; 
    }

    /**
     * Add attributionuser
     *
     * @param \CA\CourrierBundle\Entity\AttributionUser $attributionuser
     *
     * @return Attribution
     */
    public function addAttributionuser(\CA\CourrierBundle\Entity\AttributionUser $attributionuser)
    {
        $this->attributionusers[] = $attributionuser;
        $attributionuser->setAttribution($this);
        return $this;
    }

    /**
     * Remove attributionuser
     *
     * @param \CA\CourrierBundle\Entity\AttributionUser $attributionuser
     */
    public function removeAttributionuser(\CA\CourrierBundle\Entity\AttributionUser $attributionuser)
    {
        $this->attributionusers->removeElement($attributionuser);
    }

    /**
     * Get attributionusers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttributionusers()
    {
        return $this->attributionusers;
    }
}
