<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pokedex
 *
 * @ORM\Table(name="pokedex")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\PokedexRepository")
 */
class Pokedex
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

