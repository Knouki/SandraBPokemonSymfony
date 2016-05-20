<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeDePokemons
 *
 * @ORM\Table(name="typedepokemons")
 * @ORM\Entity
 */
class TypeDePokemons
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
     * @ORM\Column(name="attaque", type="integer", nullable=true)
     */
    private $attaque;

    /**
     * @var integer
     *
     * @ORM\Column(name="attaque_spe", type="integer", nullable=true)
     */
    private $attaqueSpe;

    /**
     * @var integer
     *
     * @ORM\Column(name="defence", type="integer", nullable=true)
     */
    private $defence;

    /**
     * @var integer
     *
     * @ORM\Column(name="defence_spe", type="integer", nullable=true)
     */
    private $defenceSpe;

    /**
     * @var integer
     *
     * @ORM\Column(name="vitesse", type="integer", nullable=true)
     */
    private $vitesse;

    /**
     * @var integer
     *
     * @ORM\Column(name="pv", type="integer", nullable=true)
     */
    private $pv;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_type_pokemons", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypePokemons;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\Zones", mappedBy="idTypePokemons")
     */
    private $idZones;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\Types", inversedBy="idTypePokemons")
     * @ORM\JoinTable(name="possedelestypes",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_type_pokemons", referencedColumnName="id_type_pokemons")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_types", referencedColumnName="id_types")
     *   }
     * )
     */
    private $idTypes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\TypeDePokemons", inversedBy="idTypePok")
     * @ORM\JoinTable(name="evolueen",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_type_pokemons", referencedColumnName="id_type_pokemons")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_type_pokemons_evolution", referencedColumnName="id_type_pokemons")
     *   }
     * )
     */
    private $idTypePokemonsEvolution;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\TypeDePokemons", mappedBy="idTypePokemonsEvolution")
     */
    private $idTypePok;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idZones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idTypes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idTypePokemonsEvolution = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idTypePok = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return integer
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
     * @return integer
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
     * @return integer
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
     * @return integer
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
     * @return integer
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
     * @return integer
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Get idTypePokemons
     *
     * @return integer
     */
    public function getIdTypePokemons()
    {
        return $this->idTypePokemons;
    }

    /**
     * Add idZone
     *
     * @param \SandraPokemonBundle\Entity\Zones $idZone
     *
     * @return TypeDePokemons
     */
    public function addIdZone(\SandraPokemonBundle\Entity\Zones $idZone)
    {
        $this->idZones[] = $idZone;

        return $this;
    }

    /**
     * Remove idZone
     *
     * @param \SandraPokemonBundle\Entity\Zones $idZone
     */
    public function removeIdZone(\SandraPokemonBundle\Entity\Zones $idZone)
    {
        $this->idZones->removeElement($idZone);
    }

    /**
     * Get idZones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdZones()
    {
        return $this->idZones;
    }

    /**
     * Add idType
     *
     * @param \SandraPokemonBundle\Entity\Types $idType
     *
     * @return TypeDePokemons
     */
    public function addIdType(\SandraPokemonBundle\Entity\Types $idType)
    {
        $this->idTypes[] = $idType;

        return $this;
    }

    /**
     * Remove idType
     *
     * @param \SandraPokemonBundle\Entity\Types $idType
     */
    public function removeIdType(\SandraPokemonBundle\Entity\Types $idType)
    {
        $this->idTypes->removeElement($idType);
    }

    /**
     * Get idTypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdTypes()
    {
        return $this->idTypes;
    }

    /**
     * Add idTypePokemonsEvolution
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemonsEvolution
     *
     * @return TypeDePokemons
     */
    public function addIdTypePokemonsEvolution(\SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemonsEvolution)
    {
        $this->idTypePokemonsEvolution[] = $idTypePokemonsEvolution;

        return $this;
    }

    /**
     * Remove idTypePokemonsEvolution
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemonsEvolution
     */
    public function removeIdTypePokemonsEvolution(\SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemonsEvolution)
    {
        $this->idTypePokemonsEvolution->removeElement($idTypePokemonsEvolution);
    }

    /**
     * Get idTypePokemonsEvolution
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdTypePokemonsEvolution()
    {
        return $this->idTypePokemonsEvolution;
    }

    /**
     * Add idTypePok
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $idTypePok
     *
     * @return TypeDePokemons
     */
    public function addIdTypePok(\SandraPokemonBundle\Entity\TypeDePokemons $idTypePok)
    {
        $this->idTypePok[] = $idTypePok;

        return $this;
    }

    /**
     * Remove idTypePok
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $idTypePok
     */
    public function removeIdTypePok(\SandraPokemonBundle\Entity\TypeDePokemons $idTypePok)
    {
        $this->idTypePok->removeElement($idTypePok);
    }

    /**
     * Get idTypePok
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdTypePok()
    {
        return $this->idTypePok;
    }
}
