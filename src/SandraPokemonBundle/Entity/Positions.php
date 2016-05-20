<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Positions
 *
 * @ORM\Table(name="positions", indexes={@ORM\Index(name="FK_positions_id_zones", columns={"id_zones"})})
 * @ORM\Entity
 */
class Positions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="x", type="integer", nullable=true)
     */
    private $x;

    /**
     * @var integer
     *
     * @ORM\Column(name="y", type="integer", nullable=true)
     */
    private $y;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_positions", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPositions;

    /**
     * @var \SandraPokemonBundle\Entity\Zones
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Zones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_zones", referencedColumnName="id_zones")
     * })
     */
    private $idZones;



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
     * @return integer
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
     * @return integer
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Get idPositions
     *
     * @return integer
     */
    public function getIdPositions()
    {
        return $this->idPositions;
    }

    /**
     * Set idZones
     *
     * @param \SandraPokemonBundle\Entity\Zones $idZones
     *
     * @return Positions
     */
    public function setIdZones(\SandraPokemonBundle\Entity\Zones $idZones = null)
    {
        $this->idZones = $idZones;

        return $this;
    }

    /**
     * Get idZones
     *
     * @return \SandraPokemonBundle\Entity\Zones
     */
    public function getIdZones()
    {
        return $this->idZones;
    }
}
