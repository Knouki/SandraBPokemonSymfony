<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Badges
 *
 * @ORM\Table(name="badges", indexes={@ORM\Index(name="FK_badges_id_dresseur_maitre", columns={"id_dresseur_maitre"}), @ORM\Index(name="FK_badges_id_zones", columns={"id_zones"})})
 * @ORM\Entity
 */
class Badges
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_badges", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBadges;

    /**
     * @var \SandraPokemonBundle\Entity\Dresseurs
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Dresseurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dresseur_maitre", referencedColumnName="id_dresseur")
     * })
     */
    private $idDresseurMaitre;

    /**
     * @var \SandraPokemonBundle\Entity\Zones
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Zones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_zones", referencedColumnName="id_zones")
     * })
     */
    private $idZones;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\Dresseurs", mappedBy="idBadges")
     */
    private $idDresseur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idDresseur = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Badges
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
     * Get idBadges
     *
     * @return integer
     */
    public function getIdBadges()
    {
        return $this->idBadges;
    }

    /**
     * Set idDresseurMaitre
     *
     * @param \SandraPokemonBundle\Entity\Dresseurs $idDresseurMaitre
     *
     * @return Badges
     */
    public function setIdDresseurMaitre(\SandraPokemonBundle\Entity\Dresseurs $idDresseurMaitre = null)
    {
        $this->idDresseurMaitre = $idDresseurMaitre;

        return $this;
    }

    /**
     * Get idDresseurMaitre
     *
     * @return \SandraPokemonBundle\Entity\Dresseurs
     */
    public function getIdDresseurMaitre()
    {
        return $this->idDresseurMaitre;
    }

    /**
     * Set idZones
     *
     * @param \SandraPokemonBundle\Entity\Zones $idZones
     *
     * @return Badges
     */
    public function setIdZones(\SandraPokemonBundle\Entity\Zones $idZones = null)
    {
        $this->idZones = $idZones;

        return $this;
    }

    /**
     * Get idZones
     *
     * @return \SandraPokemonBundle\Entity\Zones
     */
    public function getIdZones()
    {
        return $this->idZones;
    }

    /**
     * Add idDresseur
     *
     * @param \SandraPokemonBundle\Entity\Dresseurs $idDresseur
     *
     * @return Badges
     */
    public function addIdDresseur(\SandraPokemonBundle\Entity\Dresseurs $idDresseur)
    {
        $this->idDresseur[] = $idDresseur;

        return $this;
    }

    /**
     * Remove idDresseur
     *
     * @param \SandraPokemonBundle\Entity\Dresseurs $idDresseur
     */
    public function removeIdDresseur(\SandraPokemonBundle\Entity\Dresseurs $idDresseur)
    {
        $this->idDresseur->removeElement($idDresseur);
    }

    /**
     * Get idDresseur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdDresseur()
    {
        return $this->idDresseur;
    }
}
