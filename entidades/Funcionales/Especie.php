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
     * @OneToMany(entity=Animal)
     */
    private $animal;
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
