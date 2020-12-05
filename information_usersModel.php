<?php

include_once  '../Persistencia/conexion.php';

class information_usersModelClass {

    private $db;
    private $listInfUsers;
    private $name;
    private $last_name;
    private $status;
    private $userID;
    private $error;
    private $idsetUser;

    public function __construct() {
        $this->db = conexion::conexionDB();
        $this->personas = array();
    }

    public function get_Users() {
        $consulta = $this->db->query("select inf.user_id ,u.email,inf.name,inf.last_name,inf.status_id from information_users inf inner join users u on inf.user_id =u.id ");
        while ($filas = $consulta->fetch_assoc()) {
            $this->listInfUsers[] = $filas;
        }
        return $this->listInfUsers;
    }
    
    public function deletUsr() {
    
        $consulta = $this->db->query("DELETE FROM information_users WHERE user_id='".$this->userID."'");
        if (!$consulta) {
            $this->error = "Error Query: " . $this->db->error;
        } 
    }

    public function set_Users() {

        $consulta = $this->db->query("insert into information_users (user_id,name,last_name,status_id) values ('" . $this->userID . "','" . $this->name . "','" . $this->last_name . "','" . $this->status . "') ");
        if (!$consulta) {
            $this->error = "Error Query: " . $this->db->error;
        } else {
            $this->idsetUser = $this->db->insert_id;
        }
        conexion::cierraConexionDB($this->db);
        return $this->users;
    }

    function getListInfUsers() {
        return $this->listInfUsers;
    }

    function getName() {
        return $this->name;
    }
    function getidsetUser() {
        return $this->idsetUser;
    }


    function getLast_name() {
        return $this->last_name;
    }

    function getStatus() {
        return $this->status;
    }

    function getUserID() {
        return $this->userID;
    }

    function getError() {
        return $this->error;
    }

    function setListInfUsers($listInfUsers): void {
        $this->listInfUsers = $listInfUsers;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setLast_name($last_name): void {
        $this->last_name = $last_name;
    }

    function setStatus($status): void {
        $this->status = $status;
    }

    function setUserID($userID): void {
        $this->userID = $userID;
    }

    function setError($error): void {
        $this->error = $error;
    }

}
