<?php

    class Consultant extends User {
        
        private $username;
        
        public function __construct($pUsername){
            parent::__construct($pUsername);
            $this->username = $pUsername;
            $this->role = User::CONSULTANT;
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
        
        // public function createConsultantProfile($pUsername, $pEmail, $pConsultantType, $pRating, $pAbout, $pProfileImage, $pFirstname, $pLastname, $pPassword, $pRole, $pAddress, $pCity, $pState, $pZip){
            
        //     $sql = "INSERT INTO consultants (username, email, consultant_type, rating, about, profile_image, firstname, lastname, password, role, address, city, state, zip)
        //             VALUES (:username, :email, :consultant_type, :rating, :about, :profile_image :firstname, :lastname, :password, :role, :address, :city, :state, :zip)";
            
        //     $values = array(
        //                     array(':username', $pUsername),
        //                     array(':email', $pEmail),
        //                     array(':consultant_type', $pConsultantType),
        //                     array(':rating', $pRating),
        //                     array(':about', $pAbout),
        //                     array(':profile_image', $pProfileImage),
        //                     array(':firstname', $pFirstname),
        //                     array(':lastname', $pLastname),
        //                     array(':password', password_hash($pPassword, PASSWORD_DEFAULT)),
        //                     array(':role', $pRole),
        //                     array(':address', $pAddress),
        //                     array(':city', $pCity),
        //                     array(':state', $pState),
        //                     array(':zip', $pZip)
        //     );

        //     $this->db->queryDB($sql, Database::EXECUTE, $values);

        // }

        public function createConsultantProfile($pUsername, $pEmail, $pConsultantType, 
        $pRating, $pAbout, $pProfileImage, $pFirstname, $pLastname, $pPassword, $pRole,
        $pAddress, $pCity, $pState, $pZip) {
            $sql = "INSERT INTO consultants (username, email, consultant_type, rating, about, profile_image, firstname, lastname, password, role, address, city, state, zip)
                    VALUES (:username, :email, :consultant_type, :rating, :about, :profile_image, :firstname, :lastname, :password, :role, :address, :city, :state, :zip)";
        
                $values = array(
                    array(':username', $pUsername),
                    array(':email', $pEmail),
                    array(':consultant_type', $pConsultantType),
                    array(':rating', $pRating),
                    array(':about', $pAbout),
                    array(':profile_image', $pProfileImage),
                    array(':firstname', $pFirstname),
                    array(':lastname', $pLastname),
                    array(':password', password_hash($pPassword, PASSWORD_DEFAULT)),
                    array(':role', $pRole),
                    array(':address', $pAddress),
                    array(':city', $pCity),
                    array(':state', $pState),
                    array(':zip', $pZip));

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
