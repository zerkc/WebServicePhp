<?php

/**
 * Created by PhpStorm.
 * User: gustavog
 * Date: 12/05/16
 * Time: 08:46 AM
 */
class AnnotationManager {

    /**
     * @param $object instancia de la clase de donde se obtendran las anotaciones
     * @param $nombre nombre del campo de la instancia a obtener las anotaciones
     * @return array devuelve un array de las propiedades con sus valores de las anotaciones
     */
    public function getManyToOn($object, $nombre) {
        $reflect = new ReflectionClass($object);
        $docComent = $reflect->getProperty($nombre)->getDocComment();
        return $this->manager(substr($docComent, strpos($docComent, "@ManyToOne") + 10));
    }

    /**
     * @param $object instancia de la clase de donde se obtendran las anotaciones
     * @param $nombre nombre del campo de la instancia a obtener las anotaciones
     * @return array devuelve un array de las propiedades con sus valores de las anotaciones
     */
    public function getOneToMany($object, $nombre) {
        $reflect = new ReflectionClass($object);
        $docComent = $reflect->getProperty($nombre)->getDocComment();
        return $this->manager(substr($docComent, strpos($docComent, "@OneToMany") + 10));
    }

    public function getOneToOne($object, $nombre) {
        $reflect = new ReflectionClass($object);
        $docComent = $reflect->getProperty($nombre)->getDocComment();
        return $this->manager(substr($docComent, strpos($docComent, "@OneToOne") + 9));
    }

    /**
     * @param $valor
     * @return array
     */
    private function manager($valor) {
        $array = array();
        if (strpos($valor, "(") !== false && strpos($valor, ")") !== false) {
            if ((strpos($valor, "@") == false) || (strpos($valor, "@") !== false && (strpos($valor, "@") > strpos($valor, "(")))) {
                $subValor = substr($valor, 1);
                while (strpos($subValor, "=") !== false) {
                    $posFinal = 0;
                    if (strpos($subValor, ",") !== false && (strpos($subValor, "@") == false || (strpos($subValor, "@") > strpos($subValor, ",")))) {
                        $posFinal = strpos($subValor, ",");
                    } elseif (strpos($subValor, ")") !== false && (strpos($subValor, "@") == false || (strpos($subValor, "@") > strpos($subValor, ")")))) {
                        $posFinal = strpos($subValor, ")");
                    } elseif (strpos($subValor, "@") !== false) {
                        break;
                    } else {
                        break;
                    }
                    $postInicial = strpos($subValor, "=");
                    $key = substr($subValor, 0, $postInicial);
                    $value = substr($subValor, $postInicial + 1, $posFinal - $postInicial - 1);
                    $array = array_merge($array, array($key => $value));
                    $subValor = substr($subValor, $posFinal + 1);
                }
            }
        }
        return $array;
    }

}
