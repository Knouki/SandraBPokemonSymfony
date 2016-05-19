<?php

namespace SandraPokemonBundle\Entity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pokemons
 *
 * @ORM\Table(name="entity\pokemons")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\PokemonsRepository")
 */
class Pokemons
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
     * @ORM\Column(name="surnom", type="string", length=30)
     */
    private $surnom;

    /**
     * @var int
     *
     * @ORM\Column(name="niveau", type="smallint")
     */
    private $niveau;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="capture", type="date")
     */
    private $capture;


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
     * Set surnom
     *
     * @param string $surnom
     *
     * @return Pokemons
     */
    public function setSurnom($surnom)
    {
        $this->surnom = $surnom;

        return $this;
    }

    /**
     * Get surnom
     *
     * @return string
     */
    public function getSurnom()
    {
        return $this->surnom;
    }

    /**
     * Set niveau
     *
     * @param integer $niveau
     *
     * @return Pokemons
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return int
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set capture
     *
     * @param \DateTime $capture
     *
     * @return Pokemons
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;

        return $this;
    }

    /**
     * Get capture
     *
     * @return \DateTime
     */
    public function getCapture()
    {
        return $this->capture;
    }
}

