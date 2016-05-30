<?php

/*
 * Copyright 2016 angel.colina.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
include_once ('/../Entidad.php');

/**
 * Description of Parroquia
 *
 * @author GustavoG
 */
class Parroquia extends Entidad {

    public $nombre;

    /**
     * @ManyToOne(entity=Municipio)
     */
    public $municipio_id;

    /**
     * @OneToMany(entity=Cliente,mappedBy=parroquia_id)
     */
    public $clientes;

    /**
     * @OneToMany(entity=Vacunacion,mappedBy=parroquia_id)
     */
    public $vacunaciones;

    /**
     * @OneToMany(entity=Caso,mappedBy=parroquia_id)
     */
    public $casos;

    public function getNombre() {
        return $this->nombre;
    }

    public function getMunicipio_id() {
        return $this->municipio_id;
    }

    public function getClientes() {
        return $this->clientes;
    }

    public function getVacunaciones() {
        return $this->vacunaciones;
    }

    public function getCasos() {
        return $this->casos;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setMunicipio_id($municipio_id) {
        $this->municipio_id = $municipio_id;
    }

    public function setClientes($clientes) {
        $this->clientes = $clientes;
    }

    public function setVacunaciones($vacunaciones) {
        $this->vacunaciones = $vacunaciones;
    }

    public function setCasos($casos) {
        $this->casos = $casos;
    }

}
