<?php

    class Admin extends User {
        
        private $username;
        
        public function __construct($pUsername){
            parent::__construct($pUsername);
            $this->username = $pUsername;
            $this->role = User::CONSULTANT;
        }
    
        
        public function isValidLogin($pPassword){
            $sql = "SELECT password FROM admin WHERE username = :username";
            
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
