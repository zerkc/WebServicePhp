<?php

include_once ('/../Entidad.php');
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
class Municipio extends Entidad {

    public $nombre;

    /**
     * @OneToMany(entity=Parroquia,mappedBy=municipio_id)
     */
    public $parroquia;

    public function getNombre() {
        return $this->nombre;
    }

    public function getParroquia() {
        return $this->parroquia;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setParroquia($parroquia) {
        $this->parroquia = $parroquia;
    }

}
