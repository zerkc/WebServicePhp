<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author GustavoG
 */
class Animal {

    /**
     * @Id
     */
    public $id;
    public $nombre;

    /**
     * @ManyToOne(entity=Especie)
     */
    public $especie_id;

    /**
     * @OneToMany(entity=Animal_has_Caso)
     */
//    public $animal_caso;

    /**
     * @OneToMany(entity=Vacunacion_has_Animal)
     */
//    public $vacunacion_animal;

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setId($id) {
        $this->id = ceil($id);
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getEspecie_id() {
        return $this->especie_id;
    }

    function setEspecie_id($especie_id) {
        $this->especie_id = $especie_id;
    }

//    function getAnimal_caso() {
//        return $this->animal_caso;
//    }
//
//    function getVacunacion_animal() {
//        return $this->vacunacion_animal;
//    }
//
//    function setAnimal_caso($animal_caso) {
//        $this->animal_caso = $animal_caso;
//    }
//
//    function setVacunacion_animal($vacunacion_animal) {
//        $this->vacunacion_animal = $vacunacion_animal;
//    }

}
