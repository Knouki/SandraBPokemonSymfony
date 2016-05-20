<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arenes
 *
 * @ORM\Table(name="arenes", indexes={@ORM\Index(name="IDX_6E4F908C5EC1E677", columns={"id_badges"}), @ORM\Index(name="IDX_6E4F908C56AA595B", columns={"id_positions"})})
 * @ORM\Entity
 */
class Arenes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_badges", type="integer", nullable=true)
     */
    private $idBadges;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_positions", type="integer", nullable=true)
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
}
