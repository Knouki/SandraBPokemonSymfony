<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arenes
 *
 * @ORM\Table(name="arenes", indexes={@ORM\Index(name="FK_arenes_id_badges", columns={"id_badges"}), @ORM\Index(name="FK_arenes_id_positions", columns={"id_positions"})})
 * @ORM\Entity
 */
class Arenes
{
    /**
     * @var Badges
     *
     * @ORM\OneToOne(targetEntity="Badges")
     * @ORM\JoinColumn(name="id_badges", referencedColumnName="id_badges")
     */
    private $idBadges;

    /**
     * @var Positions
     *
     * @ORM\OneToOne(targetEntity="Positions")
     * @ORM\JoinColumn(name="id_positions", referencedColumnName="id_positions")
     */
    private $idPositions;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idBadges
     *
     * @param integer $idBadges
     *
     * @return Arenes
     */
    public function setIdBadges($idBadges)
    {
        $this->idBadges = $idBadges;

        return $this;
    }

    /**
     * Get idBadges
     *
     * @return integer
     */
    public function getIdBadges()
    {
        return $this->idBadges;
    }

    /**
     * Set idPositions
     *
     * @param integer $idPositions
     *
     * @return Arenes
     */
    public function setIdPositions($idPositions)
    {
        $this->idPositions = $idPositions;

        return $this;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Arenes
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    function __toString()
    {
        return $this->getNom();
    }
}
