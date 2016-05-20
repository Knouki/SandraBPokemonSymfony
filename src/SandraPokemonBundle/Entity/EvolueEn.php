<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvolueEn
 *
 * @ORM\Table(name="evolue_en", indexes={@ORM\Index(name="IDX_70A069C14C0F46A4", columns={"id_type_pokemons"}), @ORM\Index(name="IDX_70A069C1B5F7E204", columns={"id_type_pokemons_typedepokemons"})})
 * @ORM\Entity
 */
class EvolueEn
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_type_pokemons", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idTypePokemons;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_type_pokemons_typedepokemons", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idTypePokemonsTypedepokemons;



    /**
     * Set idTypePokemons
     *
     * @param integer $idTypePokemons
     *
     * @return EvolueEn
     */
    public function setIdTypePokemons($idTypePokemons)
    {
        $this->idTypePokemons = $idTypePokemons;

        return $this;
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
     * Set idTypePokemonsTypedepokemons
     *
     * @param integer $idTypePokemonsTypedepokemons
     *
     * @return EvolueEn
     */
    public function setIdTypePokemonsTypedepokemons($idTypePokemonsTypedepokemons)
    {
        $this->idTypePokemonsTypedepokemons = $idTypePokemonsTypedepokemons;

        return $this;
    }

    /**
     * Get idTypePokemonsTypedepokemons
     *
     * @return integer
     */
    public function getIdTypePokemonsTypedepokemons()
    {
        return $this->idTypePokemonsTypedepokemons;
    }
}
