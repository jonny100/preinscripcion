<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paises
 *
 * @ORM\Table(name="paises")
 * @ORM\Entity
 */
class Paises
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
     * @var string
     *
     * @ORM\Column(name="continente", type="string", length=2, nullable=true)
     */
    private $continente;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_iso", type="string", length=2, nullable=true)
     */
    private $codigoIso;


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
     * @return Paises
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
     * Set continente
     *
     * @param string $continente
     * @return Paises
     */
    public function setContinente($continente)
    {
        $this->continente = $continente;

        return $this;
    }

    /**
     * Get continente
     *
     * @return string 
     */
    public function getContinente()
    {
        return $this->continente;
    }

    /**
     * Set codigoIso
     *
     * @param string $codigoIso
     * @return Paises
     */
    public function setCodigoIso($codigoIso)
    {
        $this->codigoIso = $codigoIso;

        return $this;
    }

    /**
     * Get codigoIso
     *
     * @return string 
     */
    public function getCodigoIso()
    {
        return $this->codigoIso;
    }
}
