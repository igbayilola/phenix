<?php

namespace CA\CourrierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affiliation
 *
 * @ORM\Table(name="ca_affiliation")
 * @ORM\Entity(repositoryClass="CA\CourrierBundle\Repository\AffiliationRepository")
 */
class Affiliation
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
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;
    
    /**
     * @ORM\OneToMany(targetEntity="CA\CourrierBundle\Entity\Courrier", mappedBy="affiliation")
     */
    private $courriers;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->courriers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Affiliation
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
     * @return Affiliation
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
     * Add courrier
     *
     * @param \CA\CourrierBundle\Entity\Courrier $courrier
     *
     * @return Affiliation
     */
    public function addCourrier(\CA\CourrierBundle\Entity\Courrier $courrier)
    {
        $this->courriers[] = $courrier;

        return $this;
    }

    /**
     * Remove courrier
     *
     * @param \CA\CourrierBundle\Entity\Courrier $courrier
     */
    public function removeCourrier(\CA\CourrierBundle\Entity\Courrier $courrier)
    {
        $this->courriers->removeElement($courrier);
    }

    /**
     * Get courriers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourriers()
    {
        return $this->courriers;
    }
}
