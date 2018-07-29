<?php

namespace CarboBundle\Entity;


/**
 * Hidrato
 */
class Hidrato
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $hidratoCarbono;

    /**
     * @var string
     */
    private $horasEntreno;

    /**
     * @var string
     */
    private $kmEntreno;

    /**
     * @var string
     */
    private $fechaCreacion;

    /**
     * @var string
     */
    private $fechaActualizacion;

    /**
     * @var string
     */
    private $ruta;

    /**
     * @var string
     */
    private $peso;

    /**
     * @var \CarboBundle\Entity\Users
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set hidratoCarbono
     *
     * @param string $hidratoCarbono
     *
     * @return Hidrato
     */
    public function setHidratoCarbono($hidratoCarbono)
    {
        $this->hidratoCarbono = $hidratoCarbono;

        return $this;
    }

    /**
     * Get hidratoCarbono
     *
     * @return string
     */
    public function getHidratoCarbono()
    {
        return $this->hidratoCarbono;
    }

    /**
     * Set horasEntreno
     *
     * @param string $horasEntreno
     *
     * @return Hidrato
     */
    public function setHorasEntreno($horasEntreno)
    {
        $this->horasEntreno = $horasEntreno;

        return $this;
    }

    /**
     * Get horasEntreno
     *
     * @return string
     */
    public function getHorasEntreno()
    {
        return $this->horasEntreno;
    }

    /**
     * Set kmEntreno
     *
     * @param string $kmEntreno
     *
     * @return Hidrato
     */
    public function setKmEntreno($kmEntreno)
    {
        $this->kmEntreno = $kmEntreno;

        return $this;
    }

    /**
     * Get kmEntreno
     *
     * @return string
     */
    public function getKmEntreno()
    {
        return $this->kmEntreno;
    }

    /**
     * Set fechaCreacion
     *
     * @param string $fechaCreacion
     *
     * @return Hidrato
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return string
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaActualizacion
     *
     * @param string $fechaActualizacion
     *
     * @return Hidrato
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * Get fechaActualizacion
     *
     * @return string
     */
    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }

    /**
     * Set ruta
     *
     * @param string $ruta
     *
     * @return Hidrato
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return string
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set peso
     *
     * @param string $peso
     *
     * @return Hidrato
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return string
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set user
     *
     * @param \CarboBundle\Entity\User $user
     *
     * @return Hidrato
     */
    public function setUser(\CarboBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CarboBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }


}

