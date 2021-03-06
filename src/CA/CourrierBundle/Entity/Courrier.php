<?php

namespace CA\CourrierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Doctrine\Common\Collections\ArrayCollection;

/**
 * Courrier
 *
 * @ORM\Table(name="ca_courrier")
 * @ORM\Entity(repositoryClass="CA\CourrierBundle\Repository\CourrierRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Courrier
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
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=255)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var int
     *
     * @ORM\Column(name="numAttribution", type="integer")
     */
    private $numAttribution;

    /**
     * @var bool
     *
     * @ORM\Column(name="type", type="boolean")
     */
    private $type;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateCourrier", type="date")
     */
    private $dateCourrier;

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
     * @var bool
     *
     * @ORM\Column(name="archived", type="boolean")
     */
    private $archived;

    /**
     * @var bool
     *
     * @ORM\Column(name="attribuated", type="boolean")
     */
    private $attribuated;

    /**
     * @var bool
     *
     * @ORM\Column(name="lu", type="boolean")
     */
    private $lu;
    
    /**
     * @ORM\OneToOne(targetEntity="CA\CourrierBundle\Entity\Fichier", cascade={"persist", "remove"})
     */
    private $fichier;
    
    /**
     * @ORM\ManyToOne(targetEntity="CA\CourrierBundle\Entity\Correspondant", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $correspondant;
    
    /**
     * @ORM\ManyToOne(targetEntity="CA\CourrierBundle\Entity\Affiliation", inversedBy="courriers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $affiliation;

    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->archived = false;
        $this->attribuated = false;
        
    }

    
    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \Datetime());
    }
    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set objet
     *
     * @param string $objet
     *
     * @return Courrier
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Courrier
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set numAttribution
     *
     * @param integer $numAttribution
     *
     * @return Courrier
     */
    public function setNumAttribution($numAttribution)
    {
        $this->numAttribution = $numAttribution;

        return $this;
    }

    /**
     * Get numAttribution
     *
     * @return integer
     */
    public function getNumAttribution()
    {
        return $this->numAttribution;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Courrier
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateCourrier
     *
     * @param \Date $dateCourrier
     *
     * @return Courrier
     */
    public function setDateCourrier($dateCourrier)
    {
        $this->dateCourrier = $dateCourrier;

        return $this;
    }

    /**
     * Get dateCourrier
     *
     * @return \Date
     */
    public function getDateCourrier()
    {
        return $this->dateCourrier;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Courrier
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
     * @return Courrier
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
     * Set archived
     *
     * @param boolean $archived
     *
     * @return Courrier
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
     * Set attribuated
     *
     * @param boolean $attribuated
     *
     * @return Courrier
     */
    public function setAttribuated($attribuated)
    {
        $this->attribuated = $attribuated;

        return $this;
    }

    /**
     * Get lu
     *
     * @return boolean
     */
    public function getLu()
    {
        return $this->lu;
    }

    /**
     * Set lu
     *
     * @param boolean $lu
     *
     * @return Courrier
     */
    public function setLu($lu)
    {
        $this->lu = $lu;

        return $this;
    }

    /**
     * Get attribuated
     *
     * @return boolean
     */
    public function getAttribuated()
    {
        return $this->attribuated;
    }

    /**
     * Set fichier
     *
     * @param \CA\CourrierBundle\Entity\Fichier $fichier
     *
     * @return Courrier
     */
    public function setFichier(\CA\CourrierBundle\Entity\Fichier $fichier = null)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return \CA\CourrierBundle\Entity\Fichier
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * Set correspondant
     *
     * @param \CA\CourrierBundle\Entity\Correspondant $correspondant
     *
     * @return Courrier
     */
    public function setCorrespondant(\CA\CourrierBundle\Entity\Correspondant $correspondant = null)
    {
        $this->correspondant = $correspondant;

        return $this;
    }

    /**
     * Get correspondant
     *
     * @return \CA\CourrierBundle\Entity\Correspondant
     */
    public function getCorrespondant()
    {
        return $this->correspondant;
    }

    /**
     * Set affiliation
     *
     * @param \CA\CourrierBundle\Entity\Affiliation $affiliation
     *
     * @return Courrier
     */
    public function setAffiliation(\CA\CourrierBundle\Entity\Affiliation $affiliation)
    {
        $this->affiliation = $affiliation;

        return $this;
    }

    /**
     * Get affiliation
     *
     * @return \CA\CourrierBundle\Entity\Affiliation
     */
    public function getAffiliation()
    {
        return $this->affiliation;
    }
    
    public function getintitule()
    {
      return $this->getCorrespondant()->getNom().": ".$this->getObjet();
    }
    
    
    
    public function __toString()
    {
      return $this->getCorrespondant()->getNom().": ".$this->getObjet();
    }
}
