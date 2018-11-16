<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preinscriptos
 *
 * @ORM\Table(name="preinscriptos", indexes={@ORM\Index(name="fk_preinscriptos_evento1_idx", columns={"evento_id"}), @ORM\Index(name="fk_preinscriptos_paises1_idx", columns={"paises_id"}), @ORM\Index(name="fk_preinscriptos_provincias1_idx", columns={"provincias_id"}), @ORM\Index(name="fk_preinscriptos_estudios_alcanzados1_idx", columns={"estudios_alcanzados_id"}), @ORM\Index(name="fk_preinscriptos_tipo_finalizacion_estudios_alcanzados1_idx", columns={"tipo_finalizacion_estudios_alcanzados_id"})})
 * @ORM\Entity
 */
class Preinscriptos
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
     * @ORM\Column(name="apellido", type="string", length=45, nullable=true)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=45, nullable=true)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="DNI", type="string", length=45, nullable=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=45, nullable=true)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $eMail;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=45, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="fijo", type="string", length=45, nullable=true)
     */
    private $fijo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nac", type="date", nullable=true)
     */
    private $fechaNac;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio", type="string", length=45, nullable=true)
     */
    private $domicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="profesion", type="string", length=45, nullable=true)
     */
    private $profesion;

    /**
     * @var \PreinscriptosEstados
     *
     * @ORM\ManyToOne(targetEntity="PreinscriptosEstados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="preinscriptos_estados_id", referencedColumnName="id")
     * })
     */
    private $preinscriptosestados;

    /**
     * @var \Evento
     *
     * @ORM\ManyToOne(targetEntity="Evento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evento_id", referencedColumnName="id")
     * })
     */
    private $evento;

    /**
     * @var \Paises
     *
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paises_id", referencedColumnName="id")
     * })
     */
    private $paises;

    /**
     * @var \Provincias
     *
     * @ORM\ManyToOne(targetEntity="Provincias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provincias_id", referencedColumnName="id")
     * })
     */
    private $provincias;

    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=100, nullable=true)
     */
    private $localidad;

    /**
     * @var \EstudiosAlcanzados
     *
     * @ORM\ManyToOne(targetEntity="EstudiosAlcanzados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estudios_alcanzados_id", referencedColumnName="id")
     * })
     */
    private $estudiosAlcanzados;

    /**
     * @var \TipoFinalizacionEstudiosAlcanzados
     *
     * @ORM\ManyToOne(targetEntity="TipoFinalizacionEstudiosAlcanzados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_finalizacion_estudios_alcanzados_id", referencedColumnName="id")
     * })
     */
    private $tipoFinalizacionEstudiosAlcanzados;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_preinsc", type="date", nullable=false)
     */
    private $fechaPreinsc;


    public function __toString() {
        return ''.$this->apellido.' '.$this->nombres;
    }
    
    public function __construct()
    {
        $fechaactual =  new \DateTime("now");
        $this->setFechaPreinsc($fechaactual) ;
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
     * Set apellido
     *
     * @param string $apellido
     * @return Preinscriptos
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Preinscriptos
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Preinscriptos
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Preinscriptos
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set eMail
     *
     * @param string $eMail
     * @return Preinscriptos
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;

        return $this;
    }

    /**
     * Get eMail
     *
     * @return string 
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Preinscriptos
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set fijo
     *
     * @param string $fijo
     * @return Preinscriptos
     */
    public function setFijo($fijo)
    {
        $this->fijo = $fijo;

        return $this;
    }

    /**
     * Get fijo
     *
     * @return string 
     */
    public function getFijo()
    {
        return $this->fijo;
    }

    /**
     * Set fechaNac
     *
     * @param \DateTime $fechaNac
     * @return Preinscriptos
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    /**
     * Get fechaNac
     *
     * @return \DateTime 
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return Preinscriptos
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set profesion
     *
     * @param string $profesion
     * @return Preinscriptos
     */
    public function setProfesion($profesion)
    {
        $this->profesion = $profesion;

        return $this;
    }

    /**
     * Get profesion
     *
     * @return string 
     */
    public function getProfesion()
    {
        return $this->profesion;
    }



    /**
     * Set evento
     *
     * @param \AppBundle\Entity\Evento $evento
     * @return Preinscriptos
     */
    public function setEvento(\AppBundle\Entity\Evento $evento = null)
    {
        $this->evento = $evento;

        return $this;
    }

    /**
     * Get evento
     *
     * @return \AppBundle\Entity\Evento 
     */
    public function getEvento()
    {
        return $this->evento;
    }

    /**
     * Set paises
     *
     * @param \AppBundle\Entity\Paises $paises
     * @return Preinscriptos
     */
    public function setPaises(\AppBundle\Entity\Paises $paises = null)
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

    /**
     * Set provincias
     *
     * @param \AppBundle\Entity\Provincias $provincias
     * @return Preinscriptos
     */
    public function setProvincias(\AppBundle\Entity\Provincias $provincias = null)
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

    /**
     * Set estudiosAlcanzados
     *
     * @param \AppBundle\Entity\EstudiosAlcanzados $estudiosAlcanzados
     * @return Preinscriptos
     */
    public function setEstudiosAlcanzados(\AppBundle\Entity\EstudiosAlcanzados $estudiosAlcanzados = null)
    {
        $this->estudiosAlcanzados = $estudiosAlcanzados;

        return $this;
    }

    /**
     * Get estudiosAlcanzados
     *
     * @return \AppBundle\Entity\EstudiosAlcanzados 
     */
    public function getEstudiosAlcanzados()
    {
        return $this->estudiosAlcanzados;
    }

    /**
     * Set tipoFinalizacionEstudiosAlcanzados
     *
     * @param \AppBundle\Entity\TipoFinalizacionEstudiosAlcanzados $tipoFinalizacionEstudiosAlcanzados
     * @return Preinscriptos
     */
    public function setTipoFinalizacionEstudiosAlcanzados(\AppBundle\Entity\TipoFinalizacionEstudiosAlcanzados $tipoFinalizacionEstudiosAlcanzados = null)
    {
        $this->tipoFinalizacionEstudiosAlcanzados = $tipoFinalizacionEstudiosAlcanzados;

        return $this;
    }

    /**
     * Get tipoFinalizacionEstudiosAlcanzados
     *
     * @return \AppBundle\Entity\TipoFinalizacionEstudiosAlcanzados 
     */
    public function getTipoFinalizacionEstudiosAlcanzados()
    {
        return $this->tipoFinalizacionEstudiosAlcanzados;
    }

    /**
     * Set preinscriptosestados
     *
     * @param \AppBundle\Entity\PreinscriptosEstados $preinscriptosestados
     *
     * @return Preinscriptos
     */
    public function setPreinscriptosestados(\AppBundle\Entity\PreinscriptosEstados $preinscriptosestados = null)
    {
        $this->preinscriptosestados = $preinscriptosestados;

        return $this;
    }

    /**
     * Get preinscriptosestados
     *
     * @return \AppBundle\Entity\PreinscriptosEstados
     */
    public function getPreinscriptosestados()
    {
        return $this->preinscriptosestados;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     *
     * @return Preinscriptos
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set fechaPreinsc
     *
     * @param \DateTime $fechaPreinsc
     *
     * @return Preinscriptos
     */
    public function setFechaPreinsc($fechaPreinsc)
    {
        $this->fechaPreinsc = $fechaPreinsc;

        return $this;
    }

    /**
     * Get fechaPreinsc
     *
     * @return \DateTime
     */
    public function getFechaPreinsc()
    {
        return $this->fechaPreinsc;
    }
}
