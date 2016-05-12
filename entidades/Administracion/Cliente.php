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
    private $id;
    private $telefono;
    private $direccion;
    /**
     * @ManyToOne
     */
    private $Parroquia_id;
    /**
     * @ManyToOne
     */
    private $Persona_id;

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

    public function getPersona_id() {
        return $this->Persona_id;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function setPersona_id($Persona_id) {
        $this->Persona_id = $Persona_id;
    }

}
