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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\Types", inversedBy="idTypesBase")
     * @ORM\JoinTable(name="fortcontre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_types_base", referencedColumnName="id_types")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_types_faible", referencedColumnName="id_types")
     *   }
     * )
     */
    private $idTypesFaible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\Types", inversedBy="idTypesBase")
     * @ORM\JoinTable(name="faiblecontre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_types_base", referencedColumnName="id_types")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_types_fort", referencedColumnName="id_types")
     *   }
     * )
     */
    private $idTypesFort;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTypePokemons = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idTypesFaible = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idTypesFort = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add idTypesFaible
     *
     * @param \SandraPokemonBundle\Entity\Types $idTypesFaible
     *
     * @return Types
     */
    public function addIdTypesFaible(\SandraPokemonBundle\Entity\Types $idTypesFaible)
    {
        $this->idTypesFaible[] = $idTypesFaible;

        return $this;
    }

    /**
     * Remove idTypesFaible
     *
     * @param \SandraPokemonBundle\Entity\Types $idTypesFaible
     */
    public function removeIdTypesFaible(\SandraPokemonBundle\Entity\Types $idTypesFaible)
    {
        $this->idTypesFaible->removeElement($idTypesFaible);
    }

    /**
     * Get idTypesFaible
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdTypesFaible()
    {
        return $this->idTypesFaible;
    }

    /**
     * Add idTypesFort
     *
     * @param \SandraPokemonBundle\Entity\Types $idTypesFort
     *
     * @return Types
     */
    public function addIdTypesFort(\SandraPokemonBundle\Entity\Types $idTypesFort)
    {
        $this->idTypesFort[] = $idTypesFort;

        return $this;
    }

    /**
     * Remove idTypesFort
     *
     * @param \SandraPokemonBundle\Entity\Types $idTypesFort
     */
    public function removeIdTypesFort(\SandraPokemonBundle\Entity\Types $idTypesFort)
    {
        $this->idTypesFort->removeElement($idTypesFort);
    }

    /**
     * Get idTypesFort
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdTypesFort()
    {
        return $this->idTypesFort;
    }
}
