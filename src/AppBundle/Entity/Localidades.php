<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localidades
 *
 * @ORM\Table(name="localidades", indexes={@ORM\Index(name="fk_localidades_dptos_partidos1_idx", columns={"dptos_partidos_id"})})
 * @ORM\Entity
 */
class Localidades
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
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_abreviado", type="string", length=60, nullable=false)
     */
    private $nombreAbreviado;

    /**
     * @var integer
     *
     * @ORM\Column(name="ddn", type="integer", nullable=true)
     */
    private $ddn;

    /**
     * @var \DptosPartidos
     *
     * @ORM\ManyToOne(targetEntity="DptosPartidos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dptos_partidos_id", referencedColumnName="id")
     * })
     */
    private $dptosPartidos;


    public function __toString() {
        return ''.$this->nombre;
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
     * @return Localidades
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
     * Set nombreAbreviado
     *
     * @param string $nombreAbreviado
     * @return Localidades
     */
    public function setNombreAbreviado($nombreAbreviado)
    {
        $this->nombreAbreviado = $nombreAbreviado;

        return $this;
    }

    /**
     * Get nombreAbreviado
     *
     * @return string 
     */
    public function getNombreAbreviado()
    {
        return $this->nombreAbreviado;
    }

    /**
     * Set ddn
     *
     * @param integer $ddn
     * @return Localidades
     */
    public function setDdn($ddn)
    {
        $this->ddn = $ddn;

        return $this;
    }

    /**
     * Get ddn
     *
     * @return integer 
     */
    public function getDdn()
    {
        return $this->ddn;
    }

    /**
     * Set dptosPartidos
     *
     * @param \AppBundle\Entity\DptosPartidos $dptosPartidos
     * @return Localidades
     */
    public function setDptosPartidos(\AppBundle\Entity\DptosPartidos $dptosPartidos = null)
    {
        $this->dptosPartidos = $dptosPartidos;

        return $this;
    }

    /**
     * Get dptosPartidos
     *
     * @return \AppBundle\Entity\DptosPartidos 
     */
    public function getDptosPartidos()
    {
        return $this->dptosPartidos;
    }
}
