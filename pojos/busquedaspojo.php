<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BusquedasNovedadesPojo
 *
 * @author angel.colina
 */
class BusquedasPojo {

    private $cantidad;
    private $resultados;

    function __construct($cantidad = 0, $resultados = NULL) {
        $this->cantidad = $cantidad;
        $this->resultados = $resultados;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getResultados() {
        return $this->resultados;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setResultados($resultados) {
        $this->resultados = $resultados;
    }

}
