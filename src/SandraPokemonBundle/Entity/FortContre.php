<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FortContre
 *
 * @ORM\Table(name="fort_contre", indexes={@ORM\Index(name="IDX_ED0A0C7AB7B5C800", columns={"id_types"}), @ORM\Index(name="IDX_ED0A0C7AB89BAE69", columns={"id_types_1"})})
 * @ORM\Entity
 */
class FortContre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_types", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idTypes;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_types_1", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idTypes1;



    /**
     * Set idTypes
     *
     * @param integer $idTypes
     *
     * @return FortContre
     */
    public function setIdTypes($idTypes)
    {
        $this->idTypes = $idTypes;

        return $this;
    }

    /**
     * Get idTypes
     *
     * @return integer
     */
    public function getIdTypes()
    {
        return $this->idTypes;
    }

    /**
     * Set idTypes1
     *
     * @param integer $idTypes1
     *
     * @return FortContre
     */
    public function setIdTypes1($idTypes1)
    {
        $this->idTypes1 = $idTypes1;

        return $this;
    }

    /**
     * Get idTypes1
     *
     * @return integer
     */
    public function getIdTypes1()
    {
        return $this->idTypes1;
    }
}
