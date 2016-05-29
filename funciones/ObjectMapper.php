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

/**
 * Description of ObjectMapper
 *
 * @author angel.colina
 */
class ObjectMapper {

    private $json;
    private $funcion;

    function __construct($json) {
        $this->json = json_decode($json);
        $this->funcion = new funcion();
    }

    /**
     * Metodo encargado de mappear los valores del json en un object
     * @param type $clase clase a mappear
     * @return array de objects
     */
    public function createObject($clase) {
        if (is_null($this->json)) {
            return NULL;
        }
        if (is_array($this->json)) {
            $arrayObject = array();
            foreach ($this->json as $jsonValue) {
                $object = $this->mappeObject($clase, $jsonValue);
                if ($object != NULL) {
                    array_push($arrayObject, $object);
                }
            }
            return $arrayObject;
        } else {
            return $this->mappeObject($clase, $this->json);
        }
    }

    private function mappeObject($clase, $array) {
        $reflect = new ReflectionClass($clase);
        $object = $reflect->newInstanceArgs();
        if ($object == NULL) {
            return NULL;
        }
        $this->funcion->setArray($object, $array);
        return $object;
    }

}
