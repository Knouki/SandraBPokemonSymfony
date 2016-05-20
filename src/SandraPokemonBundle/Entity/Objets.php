<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objets
 *
 * @ORM\Table(name="objets", indexes={@ORM\Index(name="IDX_334ABAD96C6C7F76", columns={"id_nonjoueur"}), @ORM\Index(name="IDX_334ABAD98D136A08", columns={"id_typeObjet"})})
 * @ORM\Entity
 */
class Objets
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_nonjoueur", type="integer", nullable=true)
     */
    private $idNonjoueur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="smallint", nullable=false)
     */
    private $quantite;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_typeObjet", type="integer", nullable=true)
     */
    private $idTypeobjet;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idNonjoueur
     *
     * @param integer $idNonjoueur
     *
     * @return Objets
     */
    public function setIdNonjoueur($idNonjoueur)
    {
        $this->idNonjoueur = $idNonjoueur;

        return $this;
    }

    /**
     * Get idNonjoueur
     *
     * @return integer
     */
    public function getIdNonjoueur()
    {
        return $this->idNonjoueur;
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
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set idTypeobjet
     *
     * @param integer $idTypeobjet
     *
     * @return Objets
     */
    public function setIdTypeobjet($idTypeobjet)
    {
        $this->idTypeobjet = $idTypeobjet;

        return $this;
    }

    /**
     * Get idTypeobjet
     *
     * @return integer
     */
    public function getIdTypeobjet()
    {
        return $this->idTypeobjet;
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
