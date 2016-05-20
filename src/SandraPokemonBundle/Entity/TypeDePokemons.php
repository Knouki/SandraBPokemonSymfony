<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use SandraPokemonBundle\Entity\Types;

/**
 * TypeDePokemons
 *
 * @ORM\Table(name="type_de_pokemons")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\TypeDePokemonsRepository")
 */
class TypeDePokemons
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
     * @ORM\Column(name="nom", type="string", length=10)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="attaque", type="smallint")
     */
    private $attaque;

    /**
     * @var int
     *
     * @ORM\Column(name="attaque_spe", type="smallint")
     */
    private $attaqueSpe;

    /**
     * @var int
     *
     * @ORM\Column(name="defence", type="smallint")
     */
    private $defence;

    /**
     * @var int
     *
     * @ORM\Column(name="defence_spe", type="smallint")
     */
    private $defenceSpe;

    /**
     * @var int
     *
     * @ORM\Column(name="vitesse", type="smallint")
     */
    private $vitesse;

    /**
     * @var int
     *
     * @ORM\Column(name="pv", type="smallint")
     */
    private $pv;

    /**
     * @var Pokedex
     *
     * @ORM\ManyToOne(targetEntity="Pokedex")
     * @ORM\JoinColumn(name="id_pokedex", referencedColumnName="id", nullable=true)
     */
    private $pokedex;

    /**
     * @ORM\ManyToMany(targetEntity="Types")
     * @ORM\JoinTable(name="possede_les_types",
     *      joinColumns={@ORM\JoinColumn(name="id_type_pokemons", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_types", referencedColumnName="id")}
     *      )
     */
    private $types;

    /**
     * @ORM\ManyToMany(targetEntity="TypeDePokemons")
     * @ORM\JoinTable(name="evolue_en",
     *      joinColumns={@ORM\JoinColumn(name="id_type_pokemons", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_type_pokemons_typedepokemons", referencedColumnName="id")}
     *      )
     */
    private $evolution;


    public function __construct() {
        $this->types = new ArrayCollection();
        $this->fortContre = new ArrayCollection();
    }

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
     * @return TypeDePokemons
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
     * Set attaque
     *
     * @param integer $attaque
     *
     * @return TypeDePokemons
     */
    public function setAttaque($attaque)
    {
        $this->attaque = $attaque;

        return $this;
    }

    /**
     * Get attaque
     *
     * @return int
     */
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * Set attaqueSpe
     *
     * @param integer $attaqueSpe
     *
     * @return TypeDePokemons
     */
    public function setAttaqueSpe($attaqueSpe)
    {
        $this->attaqueSpe = $attaqueSpe;

        return $this;
    }

    /**
     * Get attaqueSpe
     *
     * @return int
     */
    public function getAttaqueSpe()
    {
        return $this->attaqueSpe;
    }

    /**
     * Set defence
     *
     * @param integer $defence
     *
     * @return TypeDePokemons
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;

        return $this;
    }

    /**
     * Get defence
     *
     * @return int
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * Set defenceSpe
     *
     * @param integer $defenceSpe
     *
     * @return TypeDePokemons
     */
    public function setDefenceSpe($defenceSpe)
    {
        $this->defenceSpe = $defenceSpe;

        return $this;
    }

    /**
     * Get defenceSpe
     *
     * @return int
     */
    public function getDefenceSpe()
    {
        return $this->defenceSpe;
    }

    /**
     * Set vitesse
     *
     * @param integer $vitesse
     *
     * @return TypeDePokemons
     */
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Get vitesse
     *
     * @return int
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Set pv
     *
     * @param integer $pv
     *
     * @return TypeDePokemons
     */
    public function setPv($pv)
    {
        $this->pv = $pv;

        return $this;
    }

    /**
     * Get pv
     *
     * @return int
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * @return Pokedex
     */
    public function getPokedex()
    {
        return $this->pokedex;
    }

    /**
     * @param Pokedex $pokedex
     */
    public function setPokedex($pokedex)
    {
        $this->pokedex = $pokedex;
    }

    /**
     * Add type
     *
     * @param \SandraPokemonBundle\Entity\Types $type
     *
     * @return TypeDePokemons
     */
    public function addType(\SandraPokemonBundle\Entity\Types $type)
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \SandraPokemonBundle\Entity\Types $type
     */
    public function removeType(\SandraPokemonBundle\Entity\Types $type)
    {
        $this->types->removeElement($type);
    }

    /**
     * Get types
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Add evolution
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $evolution
     *
     * @return TypeDePokemons
     */
    public function addEvolution(\SandraPokemonBundle\Entity\TypeDePokemons $evolution)
    {
        $this->evolution[] = $evolution;

        return $this;
    }

    /**
     * Remove evolution
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $evolution
     */
    public function removeEvolution(\SandraPokemonBundle\Entity\TypeDePokemons $evolution)
    {
        $this->evolution->removeElement($evolution);
    }

    /**
     * Get evolution
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvolution()
    {
        return $this->evolution;
    }
}
