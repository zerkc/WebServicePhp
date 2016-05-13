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
    private $id;
    private $nombre;
    /**
     * @ManyToOne
     */
    private $Especie_id;
    /**
     * @OneToMany(entity=Animal_has_Caso)
     */
    private $animal_caso;
    /**
     * @OneToMany(entity=Vacunacion_has_Animal)
     */
    private $vacunacion_animal;

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEspecie_id() {
        return $this->Especie_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEspecie_id($Especie_id) {
        $this->Especie_id = $Especie_id;
    }

}
