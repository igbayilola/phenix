<?php

namespace CA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organigramme
 *
 * @ORM\Table(name="ca_organigramme")
 * @ORM\Entity(repositoryClass="CA\UserBundle\Repository\OrganigrammeRepository")
 */
class Organigramme
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
     * @ORM\ManyToOne(targetEntity="Organigramme")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;
    
    /**
     * @ORM\ManyToOne(targetEntity="CA\UserBundle\Entity\Taglevel", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $level;
    
    /**
     * @ORM\ManyToOne(targetEntity="CA\UserBundle\Entity\Tagposition", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $position;


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
     * Set parent
     *
     * @param integer $parent
     *
     * @return Organigramme
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return int
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return Organigramme
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Organigramme
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
    
    public function getintitule()
    {
      return $this->getLevel()->getTag()." (".$this->getPosition()->getTag().")";
    }
}
