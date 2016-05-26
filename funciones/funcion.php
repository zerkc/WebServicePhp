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
            if (strtolower($method->getName()) == "set" . strtolower(str_replace("_", "", $nombre))) {
                $metodoReflexionado = new ReflectionMethod($reflect->getName(), $method->getName());
                return $metodoReflexionado->invoke($object, $value);
            }
        }
//        echo "Return null $nombre <hr>";
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
        return $this->containsAnnotation($reflect->getProperty($nombre), '@Id');
    }

    public function containsAnnotation($property, $annotation) {
        return (strpos($property->getDocComment(), $annotation) !== false);
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
            $valor.=$this->sqlData($obj) . ", ";
        }

        $filas = substr($filas, 0, strlen($filas) - 1) . ")";
        $valor = substr($valor, 0, strlen($valor) - 2) . ")";
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
            $valor.=$Field . "=" . $this->sqlData($obj) . ", ";
            if ($this->isPrimary($object, $Field)) {
                $filas .=$Field . "=" . $this->sqlData($obj) . ", ";
            }
        }
        $valor = substr($valor, 0, strlen($valor) - 2) . "";
        $filas = substr($filas, 0, strlen($filas) - 2) . "";
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

        $f = substr($f, 0, strlen($f) - 2) . "";

        return $query . $f;
    }

    public function crearQuery($query, $parametros, $cantidad, $inicio = -1) {
        $subQuery = $query;
        if (strpos($subQuery, ":") !== false) {
            while (strpos($subQuery, ":") !== false) {
                $subQuery = substr($subQuery, strpos($subQuery, ":"));
                $final = strlen($subQuery);
                if (strpos($subQuery, " ") !== false) {
                    $final = strpos($subQuery, " ");
                }
                $key = substr($subQuery, strpos($subQuery, ":") + 1, $final - strpos($subQuery, ":") - 1);
                $query = str_replace(":" . $key, $this->sqlData($parametros[$key]), $query);
                $subQuery = substr($subQuery, $final);
            }
        }
        if ($cantidad > 0) {
            $query.=" limit $cantidad";
        }
        if ($inicio > 0) {
            $query.=" offset $inicio";
        }
        return $this->ejecutarQuery($query);
    }

    public function ejecutarQuery($query) {
        $resultados = array();
        $entidad = $this->getEntiyQuery($query);
        $conexion = new conexion();
        $con = $conexion->getCon();
        $result = $con->query($query);
        if ($result !== false) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $obj = $this->newObject($entidad, $row);
                $resultados = array_merge($resultados, array($obj));
            }
        }
        return $resultados;
    }

    public function getEntiyQuery($query) {
        if (strpos(strtolower($query), "select") !== false) {
            $q = preg_split("/ /", $query);
            $variable = "";
            for ($i = 0; $i < count($q); $i++) {
                if ($q[$i] == "*") {
                    return $q[$i + 2];
                } else if (preg_match("/[a-zA-Z]+[0-9]{0,}\\.\\*/", $q[$i])) {
                    $variable = str_replace(".*", "", $q[$i]);
                } else if ($q[$i] == $variable) {
                    return $q[$i - 1];
                }
            }
        }
    }

    private function isEndQuery($sentence) {
        
    }

    /**
     *
     */
    public function newObject($class, $parametros) {
        $reflexion = new ReflectionClass($class);
        $AM = new AnnotationManager();
        $instance = $reflexion->newInstanceWithoutConstructor();
        $param = $this->getProperty($instance);

        foreach ($param as $field => $value) {

            if (isset($parametros[$field])) {
                if ($this->containsAnnotation($reflexion->getProperty($field), '@ManyToOne')) {
                    $ManyToOne = $AM->getManyToOn($class, $field);
                    if (isset($ManyToOne["entity"])) {
                        $ref = new ReflectionClass($ManyToOne["entity"]);
                        $ins = $ref->newInstanceWithoutConstructor();
                        $r = $this->crearQuery("SELECT * FROM " . $ref->getName() . " WHERE id=:id", array("id" => ceil($parametros[$field])));
                        //insert result in $int
                        $this->setValor($instance, $field, $r);
                    }
                } else if ($this->containsAnnotation($reflexion->getProperty($field), '@OneToOne')) {
                    $OneToOne = $AM->getOneToOne($class, $field);
                    if (isset($OneToOne["entity"])) {
                        $ref = new ReflectionClass($OneToOne["entity"]);
                        $r = $this->crearQuery("SELECT * FROM " . $ref->getName() . " WHERE id=:id", array("id" => ceil($parametros[$field])));
                        $this->setValor($instance, $field, $r[0]);
                    }
                } else {
                    $this->setValor($instance, $field, $parametros[$field]);
                }
            } else {
                if ($this->containsAnnotation($reflexion->getProperty($field), '@OneToMany')) {
                    $OneToMany = $AM->getOneToMany($class, $field);
                    if (isset($OneToMany["entity"])) {
                        $ref = new ReflectionClass($OneToMany["entity"]);

                        $r = $this->crearQuery("SELECT e.* FROM " . $ref->getName() . " e "
                                . "INNER JOIN $class c on c.id= e." . $OneToMany["mappedBy"] . " "
                                . "WHERE c.id=:id", array("id" => ceil($parametros['id'])), -1);
                        $this->setValor($instance, $field, $r);
                    }
                }
            }
        }
        return $instance;
    }

}
