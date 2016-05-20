<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Positions
 *
 * @ORM\Table(name="positions")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\PositionsRepository")
 */
class Positions
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
     * @ORM\Column(name="x", type="integer")
     */
    private $x;

    /**
     * @var int
     *
     * @ORM\Column(name="y", type="integer")
     */
    private $y;

    /**
     * @var Zones
     *
     * @ORM\ManyToOne(targetEntity="Zones")
     * @ORM\JoinColumn(name="id_zones", referencedColumnName="id", nullable=true)
     */
    private $zone;

    /**
     * @var Arenes
     *
     * @ORM\ManyToOne(targetEntity="Arenes")
     * @ORM\JoinColumn(name="id_arene", referencedColumnName="id", nullable=true)
     */
    private $arene;

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
     * Set x
     *
     * @param integer $x
     *
     * @return Positions
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param integer $y
     *
     * @return Positions
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @return Zones
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param Zones $zone
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
    }

    /**
     * @return Arenes
     */
    public function getArene()
    {
        return $this->arene;
    }

    /**
     * @param Arenes $arene
     */
    public function setArene($arene)
    {
        $this->arene = $arene;
    }
}

