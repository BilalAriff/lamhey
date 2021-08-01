<?php

class Admin {
    
    private $db;
    private $username;

    public function __construct($pUsername){
        $this->db = new Database();
        $this->username = $pUsername;
    }


    public function isValidLogin($pPassword){
        $sql = "SELECT password FROM admin WHERE username = :username AND role = 'admin'";

        $values = array(
            array(':username', $this->username)
        );

        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);

        if (isset($result['password']) && password_verify($pPassword, $result['password']))
            return true;
        else
            return false;

    } 
    
}


