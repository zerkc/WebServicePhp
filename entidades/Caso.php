<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caso
 *
 * @author GustavoG
 */
class Caso {

    private $id;
    private $fechaElaboracion;
    private $Parroquia_id;

    public function getId() {
        return $this->id;
    }

    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    public function getParroquia_id() {
        return $this->Parroquia_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setParroquia_id($Parroquia_id) {
        $this->Parroquia_id = $Parroquia_id;
    }

}
