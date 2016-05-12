<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vacunacion
 *
 * @author GustavoG
 */
class Vacunacion {

    /**
     * @Id
     */
    private $id;
    private $fechaElaboracion;
    /**
     * @ManyToOne
     */
    private $Semana_id;

    public function getId() {
        return $this->id;
    }

    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    public function getSemana_id() {
        return $this->Semana_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setSemana_id($Semana_id) {
        $this->Semana_id = $Semana_id;
    }

}
