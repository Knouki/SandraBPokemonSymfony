<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pokemons
 *
 * @ORM\Table(name="pokemons", indexes={@ORM\Index(name="FK_pokemons_id_attaques_1", columns={"id_attaques_1"}), @ORM\Index(name="FK_pokemons_id_attaques_2", columns={"id_attaques_2"}), @ORM\Index(name="FK_pokemons_id_attaques_3", columns={"id_attaques_3"}), @ORM\Index(name="FK_pokemons_id_attaques_4", columns={"id_attaques_4"}), @ORM\Index(name="FK_pokemons_id_dresseur", columns={"id_dresseur"}), @ORM\Index(name="FK_pokemons_id_type_pokemons", columns={"id_type_pokemons"})})
 * @ORM\Entity
 */
class Pokemons
{
    /**
     * @var string
     *
     * @ORM\Column(name="surnom", type="string", length=25, nullable=false)
     */
    private $surnom;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveau", type="integer", nullable=true)
     */
    private $niveau;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="capture", type="date", nullable=false)
     */
    private $capture;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_pokemons", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPokemons;

    /**
     * @var \SandraPokemonBundle\Entity\Dresseurs
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Dresseurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dresseur", referencedColumnName="id_dresseur")
     * })
     */
    private $idDresseur;

    /**
     * @var \SandraPokemonBundle\Entity\TypeDePokemons
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\TypeDePokemons")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_pokemons", referencedColumnName="id_type_pokemons")
     * })
     */
    private $idTypePokemons;

    /**
     * @var \SandraPokemonBundle\Entity\Attaques
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Attaques")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_attaques_4", referencedColumnName="id_attaques")
     * })
     */
    private $idAttaques4;

    /**
     * @var \SandraPokemonBundle\Entity\Attaques
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Attaques")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_attaques_3", referencedColumnName="id_attaques")
     * })
     */
    private $idAttaques3;

    /**
     * @var \SandraPokemonBundle\Entity\Attaques
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Attaques")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_attaques_2", referencedColumnName="id_attaques")
     * })
     */
    private $idAttaques2;

    /**
     * @var \SandraPokemonBundle\Entity\Attaques
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Attaques")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_attaques_1", referencedColumnName="id_attaques")
     * })
     */
    private $idAttaques1;



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
     * @return integer
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
     * Get idPokemons
     *
     * @return integer
     */
    public function getIdPokemons()
    {
        return $this->idPokemons;
    }

    /**
     * Set idDresseur
     *
     * @param \SandraPokemonBundle\Entity\Dresseurs $idDresseur
     *
     * @return Pokemons
     */
    public function setIdDresseur(\SandraPokemonBundle\Entity\Dresseurs $idDresseur = null)
    {
        $this->idDresseur = $idDresseur;

        return $this;
    }

    /**
     * Get idDresseur
     *
     * @return \SandraPokemonBundle\Entity\Dresseurs
     */
    public function getIdDresseur()
    {
        return $this->idDresseur;
    }

    /**
     * Set idTypePokemons
     *
     * @param \SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemons
     *
     * @return Pokemons
     */
    public function setIdTypePokemons(\SandraPokemonBundle\Entity\TypeDePokemons $idTypePokemons = null)
    {
        $this->idTypePokemons = $idTypePokemons;

        return $this;
    }

    /**
     * Set idTypePokemons
     *
     * @param integer $idTypePokemons
     *
     * @return Pokemons
     */
    public function setIdPokemons($idTypePokemons = null)
    {
        $this->idTypePokemons = new TypeDePokemons();
        $this->idTypePokemons.$this->setIdPokemons($idTypePokemons);

        return $this;
    }

    /**
     * Get idTypePokemons
     *
     * @return \SandraPokemonBundle\Entity\TypeDePokemons
     */
    public function getIdTypePokemons()
    {
        return $this->idTypePokemons;
    }

    /**
     * Set idAttaques4
     *
     * @param \SandraPokemonBundle\Entity\Attaques $idAttaques4
     *
     * @return Pokemons
     */
    public function setIdAttaques4(\SandraPokemonBundle\Entity\Attaques $idAttaques4 = null)
    {
        $this->idAttaques4 = $idAttaques4;

        return $this;
    }

    /**
     * Get idAttaques4
     *
     * @return \SandraPokemonBundle\Entity\Attaques
     */
    public function getIdAttaques4()
    {
        return $this->idAttaques4;
    }

    /**
     * Set idAttaques3
     *
     * @param \SandraPokemonBundle\Entity\Attaques $idAttaques3
     *
     * @return Pokemons
     */
    public function setIdAttaques3(\SandraPokemonBundle\Entity\Attaques $idAttaques3 = null)
    {
        $this->idAttaques3 = $idAttaques3;

        return $this;
    }

    /**
     * Get idAttaques3
     *
     * @return \SandraPokemonBundle\Entity\Attaques
     */
    public function getIdAttaques3()
    {
        return $this->idAttaques3;
    }

    /**
     * Set idAttaques2
     *
     * @param \SandraPokemonBundle\Entity\Attaques $idAttaques2
     *
     * @return Pokemons
     */
    public function setIdAttaques2(\SandraPokemonBundle\Entity\Attaques $idAttaques2 = null)
    {
        $this->idAttaques2 = $idAttaques2;

        return $this;
    }

    /**
     * Get idAttaques2
     *
     * @return \SandraPokemonBundle\Entity\Attaques
     */
    public function getIdAttaques2()
    {
        return $this->idAttaques2;
    }

    /**
     * Set idAttaques1
     *
     * @param \SandraPokemonBundle\Entity\Attaques $idAttaques1
     *
     * @return Pokemons
     */
    public function setIdAttaques1(\SandraPokemonBundle\Entity\Attaques $idAttaques1 = null)
    {
        $this->idAttaques1 = $idAttaques1;

        return $this;
    }

    /**
     * Get idAttaques1
     *
     * @return \SandraPokemonBundle\Entity\Attaques
     */
    public function getIdAttaques1()
    {
        return $this->idAttaques1;
    }
}
