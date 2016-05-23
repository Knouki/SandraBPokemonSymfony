<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Npc
 *
 * @ORM\Table(name="npc", indexes={@ORM\Index(name="FK_npc_id_dresseur", columns={"id_dresseur"})})
 * @ORM\Entity
 */
class Npc
{
    /**
     * @var Dresseurs
     *
     * @ORM\OneToOne(targetEntity="Dresseurs")
     * @ORM\JoinColumn(name="id_dresseur", referencedColumnName="id_dresseur")
     */
    private $idDresseur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=15, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=25, nullable=true)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=140, nullable=true)
     */
    private $texte;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set idDresseur
     *
     * @param integer $idDresseur
     *
     * @return Npc
     */
    public function setIdDresseur($idDresseur)
    {
        $this->idDresseur = $idDresseur;

        return $this;
    }

    /**
     * Get idDresseur
     *
     * @return integer
     */
    public function getIdDresseur()
    {
        return $this->idDresseur;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Npc
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
     * Set profession
     *
     * @param string $profession
     *
     * @return Npc
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return Npc
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
