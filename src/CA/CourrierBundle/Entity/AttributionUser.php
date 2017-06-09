<?php

namespace CA\CourrierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttribtionUser
 *
 * @ORM\Table(name="ca_attribution_user")
 * @ORM\Entity(repositoryClass="CA\CourrierBundle\Repository\AttributionUserRepository")
 */
class AttributionUser
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
     * @var int
     *
     * @ORM\Column(name="statut", type="integer")
     */
    private $statut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delayAt", type="datetime", nullable=true)
     */
    private $delayAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="archived", type="boolean")
     */
    private $archived;

    /**
     * @var string
     *
     * @ORM\Column(name="instruction", type="text", nullable=true)
     */
    private $instruction;

    
    /**
     * @ORM\ManyToOne(targetEntity="CA\CourrierBundle\Entity\Attribution", inversedBy="attributionusers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $attribution;
    
    /**
     * @ORM\ManyToOne(targetEntity="CA\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    
    

    //public function __construct($attribution)
    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->statut = 0;
        //$this->attribution = $attribution;
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
     * Set statut
     *
     * @param integer $statut
     *
     * @return AttribtionUser
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return int
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AttributionUser
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return AttributionUser
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set delayAt
     *
     * @param \DateTime $delayAt
     *
     * @return AttributionUser
     */
    public function setDelayAt($delayAt)
    {
        $this->delayAt = $delayAt;

        return $this;
    }

    /**
     * Get delayAt
     *
     * @return \DateTime
     */
    public function getDelayAt()
    {
        return $this->delayAt;
    }

    /**
     * Set archived
     *
     * @param boolean $archived
     *
     * @return AttributionUser
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return boolean
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Set instruction
     *
     * @param string $instruction
     *
     * @return AttributionUser
     */
    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;

        return $this;
    }

    /**
     * Get instruction
     *
     * @return string
     */
    public function getInstruction()
    {
        return $this->instruction;
    }

    /**
     * Set attribution
     *
     * @param \CA\CourrierBundle\Entity\Attribution $attribution
     *
     * @return AttributionUser
     */
    public function setAttribution(\CA\CourrierBundle\Entity\Attribution $attribution)
    {
        $this->attribution = $attribution;
    }

    /**
     * Get attribution
     *
     * @return \CA\CourrierBundle\Entity\Attribution
     */
    public function getAttribution()
    {
        return $this->attribution;
    }

    /**
     * Set user
     *
     * @param \CA\UserBundle\Entity\User $user
     *
     * @return AttributionUser
     */
    public function setUser(\CA\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CA\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
