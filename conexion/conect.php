<?php
/**
 * Created by PhpStorm.
 * User: GustavoG
 * Date: 21/04/2016
 * Time: 06:45 PM
 */




final class conexion
{
    private $con;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "zoonosis";
    /**
     * conexion constructor.
     */
    public function __construct()
    {
        $conect = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$conect)
        {
            die(mysqli_error($conect));
        }
        $this->con = $conect;
    }

    public function getCon(){
        return $this->con;
    }

}