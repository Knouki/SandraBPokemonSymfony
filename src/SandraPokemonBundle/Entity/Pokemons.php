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
     * @var Dresseurs
     *
     * @ORM\ManyToOne(targetEntity="Dresseurs")
     * @ORM\JoinColumn(name="id_dresseur", referencedColumnName="id", nullable=true)
     */
    private $dresseur;

    /**
     * @var Attaques
     *
     * @ORM\ManyToOne(targetEntity="Attaques")
     * @ORM\JoinColumn(name="id_attaques", referencedColumnName="id", nullable=true)
     */
    private $attaques;

    /**
     * @var Attaques
     *
     * @ORM\ManyToOne(targetEntity="Attaques")
     * @ORM\JoinColumn(name="id_attaques_1", referencedColumnName="id", nullable=true)
     */
    private $attaques1;

    /**
     * @var Attaques
     *
     * @ORM\ManyToOne(targetEntity="Attaques")
     * @ORM\JoinColumn(name="id_attaques_2", referencedColumnName="id", nullable=true)
     */
    private $attaques2;

    /**
     * @var Attaques
     *
     * @ORM\ManyToOne(targetEntity="Attaques")
     * @ORM\JoinColumn(name="id_attaques_3", referencedColumnName="id", nullable=true)
     */
    private $attaques3;

    /**
     * @var TypeDePokemons
     *
     * @ORM\ManyToOne(targetEntity="Typ")
     * @ORM\JoinColumn(name="id_type_pokemons", referencedColumnName="id", nullable=true)
     */
    private $typePokemons;

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

    /**
     * @return Dresseurs
     */
    public function getDresseur()
    {
        return $this->dresseur;
    }

    /**
     * @param Dresseurs $dresseur
     */
    public function setDresseur($dresseur)
    {
        $this->dresseur = $dresseur;
    }

    /**
     * @return Attaques
     */
    public function getAttaques()
    {
        return $this->attaques;
    }

    /**
     * @param Attaques $attaques
     */
    public function setAttaques($attaques)
    {
        $this->attaques = $attaques;
    }

    /**
     * @return Attaques
     */
    public function getAttaques1()
    {
        return $this->attaques1;
    }

    /**
     * @param Attaques $attaques1
     */
    public function setAttaques1($attaques1)
    {
        $this->attaques1 = $attaques1;
    }

    /**
     * @return Attaques
     */
    public function getAttaques2()
    {
        return $this->attaques2;
    }

    /**
     * @param Attaques $attaques2
     */
    public function setAttaques2($attaques2)
    {
        $this->attaques2 = $attaques2;
    }

    /**
     * @return Attaques
     */
    public function getAttaques3()
    {
        return $this->attaques3;
    }

    /**
     * @param Attaques $attaques3
     */
    public function setAttaques3($attaques3)
    {
        $this->attaques3 = $attaques3;
    }

    /**
     * @return TypeDePokemons
     */
    public function getTypePokemons()
    {
        return $this->typePokemons;
    }

    /**
     * @param TypeDePokemons $typePokemons
     */
    public function setTypePokemons($typePokemons)
    {
        $this->typePokemons = $typePokemons;
    }
}

