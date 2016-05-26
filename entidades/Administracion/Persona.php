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
    public $id;
    public $nombre;
    public $apellido;
    public $cedula;

    /**
     * @OneToOne(entity=Cliente,mappedBy=persona_id)
     */
    public $cliente;

    /**
     * @OneToOne(entity=Usuario,mappedBy=persona_id)
     */
    public $usuario;

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

    public function setId($id) {
        $this->id = ceil($id);
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

    function getCliente() {
        return $this->cliente;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

}
