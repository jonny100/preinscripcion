<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evento
 *
 * @ORM\Table(name="evento")
 * @ORM\Entity
 */
class Evento
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
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=400, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="html", type="text", nullable=true)
     */
    private $html;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechainicio", type="date", nullable=true)
     */
    private $fechainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechafin", type="date", nullable=true)
     */
    private $fechafin;

    /**
     * @var integer
     *
     * @ORM\Column(name="cupo", type="integer", nullable=true)
     */
    private $cupo;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=45, nullable=true)
     */
    private $lugar;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=400, nullable=true)
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="string", length=45, nullable=true)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="puntaje", type="string", length=45, nullable=true)
     */
    private $puntaje;

    /**
     * @var \EventoEstados
     *
     * @ORM\ManyToOne(targetEntity="EventoEstados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evento_estados_id", referencedColumnName="id")
     * })
     */
    private $eventoestados;


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
     * @return Evento
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Evento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set html
     *
     * @param string $html
     * @return Evento
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Get html
     *
     * @return string 
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Set fechainicio
     *
     * @param \DateTime $fechainicio
     * @return Evento
     */
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    /**
     * Get fechainicio
     *
     * @return \DateTime 
     */
    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    /**
     * Set fechafin
     *
     * @param \DateTime $fechafin
     * @return Evento
     */
    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;

        return $this;
    }

    /**
     * Get fechafin
     *
     * @return \DateTime 
     */
    public function getFechafin()
    {
        return $this->fechafin;
    }

    /**
     * Set cupo
     *
     * @param integer $cupo
     * @return Evento
     */
    public function setCupo($cupo)
    {
        $this->cupo = $cupo;

        return $this;
    }

    /**
     * Get cupo
     *
     * @return integer 
     */
    public function getCupo()
    {
        return $this->cupo;
    }

    /**
     * Set lugar
     *
     * @param string $lugar
     * @return Evento
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return string 
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Evento
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set precio
     *
     * @param string $precio
     * @return Evento
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set puntaje
     *
     * @param string $puntaje
     * @return Evento
     */
    public function setPuntaje($puntaje)
    {
        $this->puntaje = $puntaje;

        return $this;
    }

    /**
     * Get puntaje
     *
     * @return string 
     */
    public function getPuntaje()
    {
        return $this->puntaje;
    }



    /**
     * Set eventoestados
     *
     * @param \AppBundle\Entity\EventoEstados $eventoestados
     *
     * @return Evento
     */
    public function setEventoestados(\AppBundle\Entity\EventoEstados $eventoestados = null)
    {
        $this->eventoestados = $eventoestados;

        return $this;
    }

    /**
     * Get eventoestados
     *
     * @return \AppBundle\Entity\EventoEstados
     */
    public function getEventoestados()
    {
        return $this->eventoestados;
    }
}
