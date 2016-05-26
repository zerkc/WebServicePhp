<?php

/**
 * Created by PhpStorm.
 * User: GustavoG
 * Date: 21/04/2016
 * Time: 06:58 PM
 */
class Usuario {

    /**
     * @Id
     */
    public $id;
    public $usuario;
    public $contrasena;
    public $fechaNacimiento;

    /**
     * @OneToOne(entity=Persona)
     */
    public $persona_id;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = ceil($id);
    }

    /**
     * @return mixed
     */
    public function getUsuario() {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getContrasena() {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function getPersona_id() {
        return $this->persona_id;
    }

    function setPersona_id($persona_id) {
        $this->persona_id = $persona_id;
    }

}
