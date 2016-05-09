<?php
/**
 * Created by PhpStorm.
 * User: GustavoG
 * Date: 21/04/2016
 * Time: 06:45 PM
 */

$host = "localhost";
$user = "root";
$pass = "";
$db = "mydb";


$conect = mysqli_connect($host,$user,$pass,$db);

if(!$conect){
    die(mysqli_error($conect));
}