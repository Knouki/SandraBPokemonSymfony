<?php

namespace SandraPokemonBundle\Entity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Badges
 *
 * @ORM\Table(name="entity\badges")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\BadgesRepository")
 */
class Badges
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
     * @ORM\Column(name="nom", type="string", length=7)
     */
    private $nom;

    /**
     * @var Dresseurs
     *
     * @ORM\ManyToOne(targetEntity="Dresseurs")
     * @ORM\JoinColumn(name="id_dresseur", referencedColumnName="id", nullable=true)
     */
    private $dresseur;

    /**
     * @var Zones
     *
     * @ORM\ManyToOne(targetEntity="Zone")
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Badges
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
     * @return Type
     */
    public function getDresseur()
    {
        return $this->dresseur;
    }

    /**
     * @param Type $dresseur
     */
    public function setDresseur($dresseur)
    {
        $this->dresseur = $dresseur;
    }

    /**
     * @return Type
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param Type $zone
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
    }

    /**
     * @return Type
     */
    public function getArene()
    {
        return $this->arene;
    }

    /**
     * @param Type $arene
     */
    public function setArene($arene)
    {
        $this->arene = $arene;
    }
}

