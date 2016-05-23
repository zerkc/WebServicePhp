<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author GustavoG
 */
class Persona {

    /**
     * @Id
     */
    private $id;
    private $nombre;
    private $apellido;
    private $cedula;
    private $correo;
    /**
     * @OneToMany(entity=Cliente)
     */
    private $Clientes;
    /**
     * @OneToMany(entity=Usuario)
     */
    private $Usuarios;

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

}
