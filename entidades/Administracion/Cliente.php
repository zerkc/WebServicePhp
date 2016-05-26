<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author GustavoG
 */
class Cliente {

    /**
     * @Id
     */
    public $id;
    public $telefono;
    public $direccion;

    /**
     * @ManyToOne(entity=Parroquia)
     */
    public $Parroquia_id;

    /**
     * @OneToOne(entity=Persona)
     */
    public $persona_id;

    public function getId() {
        return $this->id;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getParroquia_id() {
        return $this->Parroquia_id;
    }

    public function setId($id) {
        $this->id = ceil($id);
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setParroquia_id($Parroquia_id) {
        $this->Parroquia_id = $Parroquia_id;
    }

    function getPersona_id() {
        return $this->persona_id;
    }

    function setPersona_id($persona_id) {
        $this->persona_id = $persona_id;
    }

}
