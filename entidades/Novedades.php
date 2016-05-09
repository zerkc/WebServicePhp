<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Novedades
 *
 * @author GustavoG
 */
class Novedades {
    
    private $id;
    private $fechaElaboracion;
    private $nombre;
    private $descripcion;
    private $Cliente_id;
    private $Usuario_id;
    
    public function getId() {
        return $this->id;
    }

    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCliente_id() {
        return $this->Cliente_id;
    }

    public function getUsuario_id() {
        return $this->Usuario_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCliente_id($Cliente_id) {
        $this->Cliente_id = $Cliente_id;
    }

    public function setUsuario_id($Usuario_id) {
        $this->Usuario_id = $Usuario_id;
    }


}
