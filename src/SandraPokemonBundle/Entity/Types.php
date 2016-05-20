<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Types
 *
 * @ORM\Table(name="types")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\TypesRepository")
 */
class Types
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
     * @ORM\Column(name="nom", type="string", length=7, unique=true)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="Types")
     * @ORM\JoinTable(name="faible_contre",
     *      joinColumns={@ORM\JoinColumn(name="id_types", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_types_1", referencedColumnName="id")}
     *      )
     */
    private $faibleContre;

    /**
     * @ORM\ManyToMany(targetEntity="Types")
     * @ORM\JoinTable(name="fort_contre",
     *      joinColumns={@ORM\JoinColumn(name="id_types", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_types_1", referencedColumnName="id")}
     *      )
     */
    private $fortContre;


    public function __construct() {
        $this->faibleContre = new ArrayCollection();
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
     * @return Types
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
}

