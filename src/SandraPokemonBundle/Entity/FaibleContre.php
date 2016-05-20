<?php

namespace SandraPokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FaibleContre
 *
 * @ORM\Table(name="faible_contre", indexes={@ORM\Index(name="IDX_260D09D0B7B5C800", columns={"id_types"}), @ORM\Index(name="IDX_260D09D0B89BAE69", columns={"id_types_1"})})
 * @ORM\Entity
 */
class FaibleContre
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
     * @return FaibleContre
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
     * @return FaibleContre
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
