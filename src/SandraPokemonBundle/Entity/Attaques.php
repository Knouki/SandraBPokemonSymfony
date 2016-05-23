<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attaques
 *
 * @ORM\Table(name="attaques", indexes={@ORM\Index(name="FK_attaques_id_types", columns={"id_types"})})
 * @ORM\Entity
 */
class Attaques
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="puissance", type="integer", nullable=true)
     */
    private $puissance;

    /**
     * @var integer
     *
     * @ORM\Column(name="precis", type="integer", nullable=true)
     */
    private $precis;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_attaques", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAttaques;

    /**
     * @var \SandraPokemonBundle\Entity\Types
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Types")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_types", referencedColumnName="id_types")
     * })
     */
    private $idTypes;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Attaques
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
     * Set puissance
     *
     * @param integer $puissance
     *
     * @return Attaques
     */
    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;

        return $this;
    }

    /**
     * Get puissance
     *
     * @return integer
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * Set precis
     *
     * @param integer $precis
     *
     * @return Attaques
     */
    public function setPrecis($precis)
    {
        $this->precis = $precis;

        return $this;
    }

    /**
     * Get precis
     *
     * @return integer
     */
    public function getPrecis()
    {
        return $this->precis;
    }

    /**
     * Get idAttaques
     *
     * @return integer
     */
    public function getIdAttaques()
    {
        return $this->idAttaques;
    }

    /**
     * Set idTypes
     *
     * @param \SandraPokemonBundle\Entity\Types $idTypes
     *
     * @return Attaques
     */
    public function setIdTypes(\SandraPokemonBundle\Entity\Types $idTypes = null)
    {
        $this->idTypes = $idTypes;

        return $this;
    }

    /**
     * Get idTypes
     *
     * @return \SandraPokemonBundle\Entity\Types
     */
    public function getIdTypes()
    {
        return $this->idTypes;
    }

    function __toString()
    {
        return $this->getNom();
    }
}
