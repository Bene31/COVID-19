<?php
namespace App\Models;
use \CodeIgniter\Model;

class Conexao extends Model {

    public function Conectar() {
        $username = 'arthur';
        $pass = 'terra';
		//$pass = '12345678';
        $host = 'localhost/XE';
        $conn = oci_connect($username, $pass, $host, 'AL32UTF8');
        // $conn = oci_connect('arthur', '12345678', 'localhost/XE');
        if (!$conn) {
            $conn = "Erro ao conectar";
        }
        return $conn;
    }

}