<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parroquia
 *
 * @author GustavoG
 */
class Parroquia {

    private $id;
    private $nombre;
    private $Municipio_id;

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getMunicipio_id() {
        return $this->Municipio_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setMunicipio_id($Municipio_id) {
        $this->Municipio_id = $Municipio_id;
    }

}