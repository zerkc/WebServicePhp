<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal_has_Caso
 *
 * @author GustavoG
 */
class Animal_has_Caso {

    /**
     * @Id
     * @ManyToOne
     */
    private $Animal_id;
    /**
     * @Id
     * @ManyToOne
     */
    private $Caso_id;
    private $cantidadIngresado;
    private $cantidadPositivos;

    public function getAnimal_id() {
        return $this->Animal_id;
    }

    public function getCaso_id() {
        return $this->Caso_id;
    }

    public function getCantidadIngresado() {
        return $this->cantidadIngresado;
    }

    public function getCantidadPositivos() {
        return $this->cantidadPositivos;
    }

    public function setAnimal_id($Animal_id) {
        $this->Animal_id = $Animal_id;
    }

    public function setCaso_id($Caso_id) {
        $this->Caso_id = $Caso_id;
    }

    public function setCantidadIngresado($cantidadIngresado) {
        $this->cantidadIngresado = $cantidadIngresado;
    }

    public function setCantidadPositivos($cantidadPositivos) {
        $this->cantidadPositivos = $cantidadPositivos;
    }

}
