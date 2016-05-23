<?php

/**
 * Created by PhpStorm.
 * User: gustavog
 * Date: 12/05/16
 * Time: 11:30 PM
 */

class QueryBuilder{

    private $query;
    private $parametros = array();
    private $contador = 1;

    /**
     * QueryBuilder constructor.
     * @param $query
     */
    public function __construct($query){
        $this->query = $query;
    }

    public function agregarCondicion($campo,$condicion,$valor,$omitirNulo,$obligatorio){

        $isWhere = "";
        $mandatory = "";
        $c = $this->contador++;

        if(strpos($this->query,"WHERE") == false){
            $isWhere = " WHERE ";
        }else{
            if($obligatorio == true){
                $mandatory = " AND ";
            }else{
                $mandatory = " OR ";
            }
        }
        $this->parametros = array_merge($this->parametros,array("p".$c => $valor));

        if($omitirNulo == true && $valor == null) {
            return $this;
        }
        $this->query .= $isWhere.$mandatory." ".$campo." ".$condicion." ".":p".$c;
        return $this;
    }

    public function ejecutarQuery1($cantidad){
        $this->ejecutarQuery2($cantidad,-1);
    }

    public function ejecutarQuery2($cantidad,$inicio){

        echo $this->query."<hr>";
        $fn = new funcion();
        $fn->crearQuery($this->query,$this->parametros,$cantidad,$inicio);
    }
}