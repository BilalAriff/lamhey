<?php

    class Guest extends User {
        
        private $username;
        
        public function __construct($pUsername){
            parent::__construct($pUsername);
            $this->username = $pUsername;
            $this->role = User::GUEST;
        }

        public function getProfileDetails($page_name, $profile_username){

            if($page_name == "consultant") {
                $sql = "SELECT id, username, firstname, lastname, email, consultant_type, rating, about, profile_image, role, address, city, zip, created_at FROM consultants WHERE username = :username";    
            }

            if($page_name == "user") {
                $sql = "SELECT id, username, firstname, lastname FROM users WHERE username = :username";
            }

            // $sql = "SELECT * FROM consultants WHERE username = :username";    
            $values = array(
                array(':username', $profile_username)
            );
            $result = $this->db->queryDB($sql, Database::SELECTALL, $values);

            return $result[0];
        }

        public function getUsername(){

            $sql = "SELECT username FROM consultants WHERE username = :username";    
            $values = array(
                array(':username', $this->username)
            );
            $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
            return $result['username'];
        }

        public function getUserData(){

            $sql = "SELECT * FROM consultants WHERE username = :username";
    
            $values = array(
                array(':username', $this->username)
            );
        
            $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
            
            return $result[0];
        }
        
        public function getUserID(){

            $sql = "SELECT id FROM consultants WHERE username = :username";
    
            $values = array(
                array(':username', $this->username)
            );
        
            $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
            
            return $result['id'];
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
