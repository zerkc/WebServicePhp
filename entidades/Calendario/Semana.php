<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Semana
 *
 * @author GustavoG
 */
class Semana {

    /**
     * @Id
     */
    private $id;
    private $semana;
    private $year;
    /**
     * @OneToMany(entity=Semana_has_Parroquia)
     */
    private $semana_parroquia;

    public function getId() {
        return $this->id;
    }

    public function getSemana() {
        return $this->semana;
    }

    public function getYear() {
        return $this->year;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSemana($semana) {
        $this->semana = $semana;
    }

    public function setYear($year) {
        $this->year = $year;
    }

}
