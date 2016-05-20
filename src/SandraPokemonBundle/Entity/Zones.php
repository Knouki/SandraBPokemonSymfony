<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zones
 *
 * @ORM\Table(name="zones", indexes={@ORM\Index(name="FK_zones_id_badges", columns={"id_badges"})})
 * @ORM\Entity
 */
class Zones
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_zones", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idZones;

    /**
     * @var \SandraPokemonBundle\Entity\Badges
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Badges")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_badges", referencedColumnName="id_badges")
     * })
     */
    private $idBadges;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\TypeDePokemons", inversedBy="idZones")
     * @ORM\JoinTable(name="viedans",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_zones", referencedColumnName="id_zones")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_type_pokemons", referencedColumnName="id_type_pokemons")
     *   }
     * )
     */
    private $idTypePokemons;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTypePokemons = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Zones
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
     * Get idZones
     *
     * @return integer
     */
    public function getIdZones()
    {
        return $this->idZones;
    }

    /**
     * Set idBadges
     *
     * @param \SandraPokemonBundle\Entity\Badges $idBadges
     *
     * @return Zones
     */
    public function setIdBadges(\SandraPokemonBundle\Entity\Badges $idBadges = null)
    {
        $this->idBadges = $idBadges;

        return $this;
    }

    /**
     * Get idBadges
     *
     * @return \SandraPokemonBundle\Entity\Badges
     */
    public function getIdBadges()
    {
        return $this->idBadges;
    }

    /**
     * Add idTypePokemon
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemon
     *
     * @return Zones
     */
    public function addIdTypePokemon(\SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemon)
    {
        $this->idTypePokemons[] = $idTypePokemon;

        return $this;
    }

    /**
     * Remove idTypePokemon
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemon
     */
    public function removeIdTypePokemon(\SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemon)
    {
        $this->idTypePokemons->removeElement($idTypePokemon);
    }

    /**
     * Get idTypePokemons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdTypePokemons()
    {
        return $this->idTypePokemons;
    }
}
