<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vacunacion_has_Animal
 *
 * @author GustavoG
 */
class Vacunacion_has_Animal {

    /**
     * @Id
     * @ManyToOne
     */
    private $Usuario_id;
    /**
     * @Id
     * @ManyToOne
     */
    private $Vacunacion_id;
    /**
     * @Id
     * @ManyToOne
     */
    private $Animal_id;
    private $cantidad;

    public function getUsuario_id() {
        return $this->Usuario_id;
    }

    public function getVacunacion_id() {
        return $this->Vacunacion_id;
    }

    public function getAnimal_id() {
        return $this->Animal_id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setUsuario_id($Usuario_id) {
        $this->Usuario_id = $Usuario_id;
    }

    public function setVacunacion_id($Vacunacion_id) {
        $this->Vacunacion_id = $Vacunacion_id;
    }

    public function setAnimal_id($Animal_id) {
        $this->Animal_id = $Animal_id;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

}
