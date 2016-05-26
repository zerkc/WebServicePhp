<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Especie
 *
 * @author GustavoG
 */
class Especie {

    /**
     * @Id
     */
    private $id;
    private $nombre;

    /**
     * @OneToMany(entity=Animal,mappedBy=especie_id)
     */
    private $animales;

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

    function getAnimales() {
        return $this->animales;
    }

    function setAnimales($animales) {
        $this->animales = $animales;
    }

}
