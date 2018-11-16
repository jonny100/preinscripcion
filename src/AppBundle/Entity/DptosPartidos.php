<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DptosPartidos
 *
 * @ORM\Table(name="dptos_partidos", indexes={@ORM\Index(name="fk_dptos_partidos_provincias1_idx", columns={"provincias_id"})})
 * @ORM\Entity
 */
class DptosPartidos
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
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado;

    /**
     * @var \Provincias
     *
     * @ORM\OneToOne(targetEntity="Provincias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provincias_id", referencedColumnName="id")
     * })
     */
    private $provincias;


    public function __toString() {
        return ''.$this->nombre;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return DptosPartidos
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
     * @return DptosPartidos
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
     * Set estado
     *
     * @param string $estado
     * @return DptosPartidos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set provincias
     *
     * @param \AppBundle\Entity\Provincias $provincias
     * @return DptosPartidos
     */
    public function setProvincias(\AppBundle\Entity\Provincias $provincias)
    {
        $this->provincias = $provincias;

        return $this;
    }

    /**
     * Get provincias
     *
     * @return \AppBundle\Entity\Provincias 
     */
    public function getProvincias()
    {
        return $this->provincias;
    }
}
