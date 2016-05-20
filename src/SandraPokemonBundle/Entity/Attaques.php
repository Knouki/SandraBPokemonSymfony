<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attaques
 *
 * @ORM\Table(name="attaques")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\AttaquesRepository")
 */
class Attaques
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
     * @ORM\Column(name="nom", type="string", length=12)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="puissance", type="smallint")
     */
    private $puissance;

    /**
     * @var int
     *
     * @ORM\Column(name="precis", type="smallint")
     */
    private $precis;

    /**
     * @var Type
     *
     * @ORM\ManyToOne(targetEntity="Types")
     * @ORM\JoinColumn(name="id_types", referencedColumnName="id", nullable=true)
     */
    private $type;

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
     * @return int
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
     * @return int
     */
    public function getPrecis()
    {
        return $this->precis;
    }

    /**
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param Type $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}

