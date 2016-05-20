<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objets
 *
 * @ORM\Table(name="objets")
 * @ORM\Entity(repositoryClass="SandraPokemonBundle\Repository\Entity\ObjetsRepository")
 */
class Objets
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
     * @ORM\Column(name="nom", type="string", length=20)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="smallint")
     */
    private $quantite;

    /**
     * @var Npc
     *
     * @ORM\ManyToOne(targetEntity="Npc")
     * @ORM\JoinColumn(name="id_nonjoueur", referencedColumnName="id", nullable=true)
     */
    private $nonJoueur;

    /**
     * @var TypeObjet
     *
     * @ORM\ManyToOne(targetEntity="TypeObjet")
     * @ORM\JoinColumn(name="id_typeObjet", referencedColumnName="id", nullable=true)
     */
    private $typeObjet;

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
     * @return Objets
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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Objets
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @return Npc
     */
    public function getNonJoueur()
    {
        return $this->nonJoueur;
    }

    /**
     * @param Npc $nonJoueur
     */
    public function setNonJoueur($nonJoueur)
    {
        $this->nonJoueur = $nonJoueur;
    }

    /**
     * @return TypeObjet
     */
    public function getTypeObjet()
    {
        return $this->typeObjet;
    }

    /**
     * @param TypeObjet $typeObjet
     */
    public function setTypeObjet($typeObjet)
    {
        $this->typeObjet = $typeObjet;
    }
}

