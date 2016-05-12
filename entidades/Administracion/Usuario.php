<?php

/**
 * Created by PhpStorm.
 * User: GustavoG
 * Date: 21/04/2016
 * Time: 06:58 PM
 */
class Usuario{

    /**
     * @Id
     * @ManyToOne(name="Gustavo",length=5)
     * @OneToMany(name="no se pepe")
     */
    private $id;
    private $usuario;
    private $contrasena;
    private $fechaNacimiento;
    /**
     * @ManyToOne
     */
    private $Permiso_id;
    /**
     * @ManyToOne
     */
    private $Persona_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return mixed
     */
    public function getPermisoId()
    {
        return $this->Permiso_id;
    }

    /**
     * @param mixed $Permiso_id
     */
    public function setPermisoId($Permiso_id)
    {
        $this->Permiso_id = $Permiso_id;
    }

    /**
     * @return mixed
     */
    public function getPersonaId()
    {
        return $this->Persona_id;
    }

    /**
     * @param mixed $Persona_id
     */
    public function setPersonaId($Persona_id)
    {
        $this->Persona_id = $Persona_id;
    }

}