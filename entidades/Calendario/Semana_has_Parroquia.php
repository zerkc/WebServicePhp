<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Semana_has_Parroquia
 *
 * @author GustavoG
 */
class Semana_has_Parroquia {

    /**
     * @Id
     * @ManyToOne(entity=Semana)
     */
    public $semana_id;

    /**
     * @Id
     * @ManyToOne(entity=Parroquia)
     */
    public $parroquia_id;

    function getSemana_id() {
        return $this->semana_id;
    }

    function getParroquia_id() {
        return $this->parroquia_id;
    }

    function setSemana_id($semana_id) {
        $this->semana_id = $semana_id;
    }

    function setParroquia_id($parroquia_id) {
        $this->parroquia_id = $parroquia_id;
    }

}
