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
    private $Semana_id;
    /**
     * @Id
     * @ManyToOne(entity=Parroquia)
     */
    private $Parroquia_id;

    public function getSemana_id() {
        return $this->Semana_id;
    }

    public function getParroquia_id() {
        return $this->Parroquia_id;
    }

    public function setSemana_id($Semana_id) {
        $this->Semana_id = $Semana_id;
    }

    public function setParroquia_id($Parroquia_id) {
        $this->Parroquia_id = $Parroquia_id;
    }

}
