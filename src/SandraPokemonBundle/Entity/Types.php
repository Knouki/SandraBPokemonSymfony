<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Types
 *
 * @ORM\Table(name="types")
 * @ORM\Entity
 */
class Types
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
     * @ORM\Column(name="id_types", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\TypeDePokemons", mappedBy="idTypes")
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
     * @return Types
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
     * Get idTypes
     *
     * @return integer
     */
    public function getIdTypes()
    {
        return $this->idTypes;
    }

    /**
     * Add idTypePokemon
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemon
     *
     * @return Types
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

    function __toString()
    {
        return $this->getNom();
    }
}
