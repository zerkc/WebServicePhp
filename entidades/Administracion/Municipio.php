<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Municipio
 *
 * @author GustavoG
 */
class Municipio {

    /**
     * @Id
     */
    public $id;
    public $nombre;

    /**
     * @OneToMany(entity=Parroquia,mappedBy=municipio_id)
     */
    public $parroquia;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getParroquia() {
        return $this->parroquia;
    }

    function setId($id) {
        $this->id = ceil($id);
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setParroquia($parroquia) {
        $this->parroquia = $parroquia;
    }


}
