<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Sonata\UserBundle\Entity\User;

/**
 * Dresseurs
 *
 * @ORM\Table(name="dresseurs", indexes={@ORM\Index(name="FK_dresseurs_id_badges", columns={"id_badges1"})})
 * @ORM\Entity
 */
class Dresseurs
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
     * @ORM\Column(name="id_dresseur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDresseur;

    /**
     * @var \SandraPokemonBundle\Entity\Badges
     *
     * @ORM\ManyToOne(targetEntity="SandraPokemonBundle\Entity\Badges")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_badges1", referencedColumnName="id_badges")
     * })
     */
    private $idBadges1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SandraPokemonBundle\Entity\Badges", inversedBy="idDresseur")
     * @ORM\JoinTable(name="gagne",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_dresseur", referencedColumnName="id_dresseur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_badges", referencedColumnName="id_badges")
     *   }
     * )
     */
    private $idBadges;

    /**
     * @var Application\Sonata\UserBundle\Entity\User
     *
     * @ORM\OneToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idBadges = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get idDresseur
     *
     * @return integer
     */
    public function getIdDresseur()
    {
        return $this->idDresseur;
    }

    /**
     * Set idBadges1
     *
     * @param \SandraPokemonBundle\Entity\Badges $idBadges1
     *
     * @return Dresseurs
     */
    public function setIdBadges1(\SandraPokemonBundle\Entity\Badges $idBadges1 = null)
    {
        $this->idBadges1 = $idBadges1;

        return $this;
    }

    /**
     * Get idBadges1
     *
     * @return \SandraPokemonBundle\Entity\Badges
     */
    public function getIdBadges1()
    {
        return $this->idBadges1;
    }

    /**
     * Add idBadge
     *
     * @param \SandraPokemonBundle\Entity\Badges $idBadge
     *
     * @return Dresseurs
     */
    public function addIdBadge(\SandraPokemonBundle\Entity\Badges $idBadge)
    {
        $this->idBadges[] = $idBadge;

        return $this;
    }

    /**
     * Remove idBadge
     *
     * @param \SandraPokemonBundle\Entity\Badges $idBadge
     */
    public function removeIdBadge(\SandraPokemonBundle\Entity\Badges $idBadge)
    {
        $this->idBadges->removeElement($idBadge);
    }

    /**
     * Get idBadges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdBadges()
    {
        return $this->idBadges;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Dresseurs
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
