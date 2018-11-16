<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincias
 *
 * @ORM\Table(name="provincias", indexes={@ORM\Index(name="fk_provincias_paises1_idx", columns={"paises_id"})})
 * @ORM\Entity
 */
class Provincias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
     */
    private $nombre;

    /**
     * @var \Paises
     *
     * @ORM\OneToOne(targetEntity="Paises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paises_id", referencedColumnName="id")
     * })
     */
    private $paises;

    public function __toString() {
        return ''.$this->nombre;
    }


    /**
     * Set id
     *
     * @param integer $id
     * @return Provincias
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Provincias
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set paises
     *
     * @param \AppBundle\Entity\Paises $paises
     * @return Provincias
     */
    public function setPaises(\AppBundle\Entity\Paises $paises)
    {
        $this->paises = $paises;

        return $this;
    }

    /**
     * Get paises
     *
     * @return \AppBundle\Entity\Paises 
     */
    public function getPaises()
    {
        return $this->paises;
    }
}
