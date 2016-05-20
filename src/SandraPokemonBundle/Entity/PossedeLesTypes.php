<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PossedeLesTypes
 *
 * @ORM\Table(name="possede_les_types", indexes={@ORM\Index(name="IDX_57DDF86B4C0F46A4", columns={"id_type_pokemons"}), @ORM\Index(name="IDX_57DDF86BB7B5C800", columns={"id_types"})})
 * @ORM\Entity
 */
class PossedeLesTypes
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
     * @ORM\Column(name="id_types", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idTypes;



    /**
     * Set idTypePokemons
     *
     * @param integer $idTypePokemons
     *
     * @return PossedeLesTypes
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
     * Set idTypes
     *
     * @param integer $idTypes
     *
     * @return PossedeLesTypes
     */
    public function setIdTypes($idTypes)
    {
        $this->idTypes = $idTypes;

        return $this;
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
}
