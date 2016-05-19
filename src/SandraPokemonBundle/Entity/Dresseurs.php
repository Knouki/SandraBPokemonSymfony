<?php

namespace SandraPokemonBundle\Entity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dresseurs
 *
 * @ORM\Table(name="entity\dresseurs")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\DresseursRepository")
 */
class Dresseurs
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
     * @ORM\Column(name="nom", type="string", length=15)
     */
    private $nom;

    /**
     * @var Npc
     *
     * @ORM\ManyToOne(targetEntity="Npc")
     * @ORM\JoinColumn(name="id_dresseur", referencedColumnName="id", nullable=true)
     */
    private $npc;

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
     * @return Dresseurs
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
     * @return Npc
     */
    public function getNpc()
    {
        return $this->npc;
    }

    /**
     * @param Npc $npc
     */
    public function setNpc($npc)
    {
        $this->npc = $npc;
    }
}
