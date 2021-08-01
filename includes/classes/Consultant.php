<?php

    class Consultant extends User{
        
        private $username;
        
        public function __construct($pUsername){
            parent::__construct();
            $this->username = $pUsername;
            $this->role = User::CONSULTANT;
        }
        
        public function isDuplicateID(){
            
            $sql = "SELECT count(username) AS num FROM consultants WHERE username = :username";
            
            $values = array(
                array(':username', $this->username)
            );
        
            $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);

            if ($result['num'] == 0)
                return false;
            else
                return true;                
            
        }
        
        public function createConsultantProfile($pUsername, $pEmail, $pFirstname, $pLastname, $pPassword, $pRole, $pAddress, $pCity, $pZip, $pState){
            
            $sql = "INSERT INTO consultants (username, email, firstname, 
                                             lastname, password, role,
                                             address, city, zip, state)
                    VALUES (:username, :email, :firstname, 
                            :lastname, :password, :role,
                            :address, :city, :zip, :state)";
            
            $values = array(
                            array(':username', $pUsername),
                            array(':email', $pEmail),
                            array(':firstname', $pFirstname),
                            array(':lastname', $pLastname),
                            array(':password', password_hash($pPassword, PASSWORD_DEFAULT)),
                            array(':role', $pRole),
                            array(':address', $pAddress),
                            array(':city', $pCity),
                            array(':zip', $pZip),
                            array(':state', $pState)
            );

            $this->db->queryDB($sql, Database::EXECUTE, $values);

        }
        
        public function isValidLogin($pPassword){
            $sql = "SELECT password FROM consultants WHERE username = :username";
            
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
