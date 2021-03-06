<?php

namespace CA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tagposition
 *
 * @ORM\Table(name="ca_tagposition")
 * @ORM\Entity(repositoryClass="CA\UserBundle\Repository\TagpositionRepository")
 */
class Tagposition
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
     * @ORM\Column(name="tag", type="string", length=255, unique=true)
     */
    private $tag;


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
     * Set tag
     *
     * @param string $tag
     *
     * @return Tagposition
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
    
    public function __toString() {
        return $this->getTag();
    }
}
