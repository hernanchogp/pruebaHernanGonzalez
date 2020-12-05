<?php
include_once  'conexion.php';
include_once  'Multifuncion.php';
class usersModel {

    private $db;
    private $listUsers;
    private $email;
    private $status;
    private $idsetUser;
    private $error;

    public function __construct() {
        $this->db = conexion::conexionDB();
        $this->personas = array();
    }

    public function get_Users() {
        $consulta = $this->db->query("select * from users");
        while ($filas = $consulta->fetch_assoc()) {
            $this->listUsers[] = $filas;
        }
        return $this->listUsers;
    }

    public function set_Users() {
        $clave = MultifuncionClass::clavealeatoria();
        $consulta = $this->db->query("insert into users (email,password,status_id) values ('" . $this->email . "','" . $clave . "','" . $this->status . "') ");
        if (!$consulta) {
            $this->error = "Error Query: " . $this->db->error;
        } else {
            $this->idsetUser = $this->db->insert_id;
        }
        conexion::cierraConexionDB($this->db);
        return $this->users;
    }

    function getEmail() {
        return $this->email;
    }

    function geterror() {
        return $this->error;
    }

    function getidsetUser() {
        return $this->idsetUser;
    }

    function getStatus() {
        return $this->status;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setStatus($status): void {
        $this->status = $status;
    }

}
