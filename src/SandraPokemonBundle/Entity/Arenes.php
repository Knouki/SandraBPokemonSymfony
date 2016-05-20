<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arenes
 *
 * @ORM\Table(name="arenes")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\ArenesRepository")
 */
class Arenes
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
     * @ORM\Column(name="nom", type="string", length=25)
     */
    private $nom;

    /**
     * @var Badges
     *
     * @ORM\ManyToOne(targetEntity="Badges")
     * @ORM\JoinColumn(name="id_badges", referencedColumnName="id", nullable=true)
     */
    private $dresseur;

    /**
     * @var Positions
     *
     * @ORM\ManyToOne(targetEntity="Positions")
     * @ORM\JoinColumn(name="id_positions", referencedColumnName="id", nullable=true)
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
     * @return Badges
     */
    public function getDresseur()
    {
        return $this->dresseur;
    }

    /**
     * @param Badges $dresseur
     */
    public function setDresseur($dresseur)
    {
        $this->dresseur = $dresseur;
    }

    /**
     * @return Positions
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param Positions $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
}

