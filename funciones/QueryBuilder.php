<?php

require_once ('funcion.php');

/**
 * Created by PhpStorm.
 * User: gustavog
 * Date: 12/05/16
 * Time: 11:30 PM
 */
class QueryBuilder {

    private $query;
    private $parametros = array();
    private $contador = 1;

    /**
     * QueryBuilder constructor.
     * @param $query
     */
    public function __construct($query) {
        $this->query = $query;
    }

    public function agregarQuery($query) {
        $this->query = $query;
        $this->parametros = array();
        $this->contador = 1;
        return $this;
    }

    public function agregarCondicion($campo, $condicion, $valor, $omitirNulo = true, $obligatorio = true) {
        $isWhere = "";
        $mandatory = "";
        $c = $this->contador++;

        if (strpos($this->query, "WHERE") == false) {
            $isWhere = " WHERE ";
        } else {
            $mandatory = $obligatorio ? " AND " : " OR ";
        }

        $this->parametros = array_merge($this->parametros, array("p" . $c => $valor));

        if ($omitirNulo == true && $valor == null) {
            return $this;
        }

        $this->query .= $isWhere . $mandatory . " $campo $condicion :p$c";

        return $this;
    }

    public function ejecutarQuery($cantidad = 1, $inicio = -1) {
        $fn = new funcion();
        $valores = $fn->crearQuery($this->query, $this->parametros, $cantidad, $inicio);
        if ($cantidad == 1 && count($valores) > 0) {
            return $valores[0];
        }
        return $valores;
    }

}
