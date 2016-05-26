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

    /**
     * @Id
     */
    public $id;
    public $nombre;
    /**
     * @ManyToOne(entity=Municipio)
     */
    public $municipio_id;

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getMunicipio_id() {
        return $this->municipio_id;
    }

    function setId($id) {
        $this->id = ceil($id);
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setMunicipio_id($municipio_id) {
        $this->municipio_id = $municipio_id;
    }

}
