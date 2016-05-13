<?php

/**
 * Created by PhpStorm.
 * User: GustavoG
 * Date: 21/04/2016
 * Time: 07:03 PM
 */


class funcion {



    /**
     * @param type $objeto
     * @return type
     */
    public function getProperty($objeto) {
        $reflect = new ReflectionClass($objeto);
        return $reflect->getDefaultProperties();
    }

    /**
     * @param $object
     * @param $nombre
     * @return mixed
     */
    public function getValor($object, $nombre) {
        $reflect = new ReflectionClass($object);
        $methods = $reflect->getMethods();
        foreach ($methods as $method) {
            if (strtolower($method->getName()) == "get" . strtolower($nombre)) {
                $metodoReflexionado = new ReflectionMethod($reflect->getName(), $method->getName());
                return $metodoReflexionado->invoke($object);
            }
        }
        return null;
    }

    /**
     * @param $object
     * @param $nombre
     * @param $value
     * @return mixed
     */
    public function setValor($object, $nombre, $value) {
        $reflect = new ReflectionClass($object);
        $methods = $reflect->getMethods();
        foreach ($methods as $method) {
            if (strtolower($method->getName()) == "set" . strtolower($nombre)) {
                $metodoReflexionado = new ReflectionMethod($reflect->getName(), $method->getName());
                return $metodoReflexionado->invoke($object, $value);
            }
        }
        return null;
    }

    /**
     * @param type $object
     * @return type
     */
    public function getArray($object) {
        $fields = $this->getProperty($object);
        $array = Array();
        foreach ($fields as $key => $value) {
            $array = array_merge($array, array($key => $this->getValor($object, $key)));
        }
        return $array;
    }

    /**
     * @param type $object
     * @param type $array
     * @return type
     */
    public function setArray($object, $array) {
        foreach ($array as $key => $value) {
            $this->setValor($object, $key, $value);
        }
        return $object;
    }

    /**
     * @param type $object
     * @param type $nombre
     * @return type
     */
    public function isPrimary($object, $nombre) {
        $reflect = new ReflectionClass($object);
        return (strpos($reflect->getProperty($nombre)->getDocComment(), '@Id') !== false);
    }

    /**
     * @param type $obj
     * @return string
     */
    public function sqlData($obj) {
        if (gettype($obj) == "integer" || gettype($obj) == "double") {
            return $obj . "";
        } else if (gettype($obj) == "string") {
            $obj = str_replace("'", "&#039;", $obj);
            return "'" . $obj . "'";
        } else if (gettype($obj) == "object") {
            $obj = str_replace("'", "&#039;", $obj);
            return "'" . $obj . "'";
        } else {
            return "null";
        }
    }

    /**
     * @param $object
     * @return string
     */
    public function createInsert($object) {
        $reflect = new ReflectionClass($object);
        $query = "INSERT INTO " . $reflect->getName() . " ";
        $filas = " (";
        $valor = " VALUES(";
        $Fields = $this->getProperty($object);
        foreach ($Fields as $Field => $value) {
            $filas .= $Field . ",";
            $obj = $this->getValor($object, $Field);
            $valor.=$this->sqlData($obj).", ";
        }

        $filas = substr($filas, 0, strlen($filas) - 1) . ")";
        $valor = substr($valor, 0, strlen($valor) - 1) . ")";
        return $query . $filas . $valor;
    }

    /**
     * @param type $object
     * @return type
     */
    public function createUpdate($object) {
        $reflect = new ReflectionClass($object);
        $query = "UPDATE " . $reflect->getName() . " SET ";
        $filas = " WHERE ";
        $valor = " ";
        $Fields = $this->getProperty($object);
        foreach ($Fields as $Field => $value) {
            $obj = $this->getValor($object, $Field);
            $valor.=$this->sqlData($obj).", ";
            if ($this->isPrimary($object, $Field)) {
                $filas .=$Field . "=" . $this->sqlData($obj) . ", ";
            }
        }
        $valor = substr($valor, 0, strlen($valor) - 1) . "";
        return $query . $valor . $filas;
    }

    /**
     * @param $object
     * @return string
     */
    public function createDelete($object) {
        $reflect = new ReflectionClass($object);
        $query = "DELETE FROM " . $reflect->getName() . " ";
        $f = " WHERE ";
        $Fields = $this->getProperty($object);
        foreach ($Fields as $Field => $value) {
            $obj = $this->getValor($object, $Field);

            if ($this->isPrimary($object, $Field)) {
                $f .=$Field . "=" . $this->sqlData($obj) . ", ";
            }
        }
        return $query . $f;
    }

    public function crearQuery($query,$parametros,$cantidad,$inicio){
        $subQuery = $query;
        if(strpos($subQuery,":") !== false) {
            while (strpos($subQuery, ":") !== false) {
                $subQuery = substr($subQuery, strpos($subQuery, ":"));
                $final = strlen($subQuery);
                if (strpos($subQuery, " ") !== false) {
                    $final = strpos($subQuery, " ");
                }
                $key = substr($subQuery, strpos($subQuery, ":") + 1, $final - strpos($subQuery, ":") - 1);
                $query = str_replace(":".$key,$this->sqlData($parametros[$key]),$query);
                $subQuery = substr($subQuery, $final);
            }
        }
        if($cantidad > 0){
            $query.=" limit $cantidad";
        }
        if($inicio > 0){
            $query.=" offset $inicio";
        }
        echo $query;
    }

}
