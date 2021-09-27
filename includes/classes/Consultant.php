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

        public function getConsultantProfileInfo($username) {

            $sql = "SELECT 	
                            id,
                            username,
                            email,
                            consultant_type,
                            rating,
                            about,
                            profile_image,
                            firstname,
                            lastname,
                            password,
                            role,
                            address,
                            city,
                            state,
                            zip
            FROM consultants WHERE username = :username";
    
            $values = array(
                array(':username', $this->username)
            );

            $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
            return $result[0];
            
        }

        public function getConsultantProfileImage($username) {
            $sql = "SELECT profile_image FROM consultants WHERE username = :username";
            $values = array( array(":username", $username) );
            $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
            return $result["profile_image"];
        }

        public function getUserData(){

            $sql = "SELECT * FROM consultants WHERE username = :username";
    
            $values = array(
                array(':username', $this->username)
            );
        
            $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
            
            return $result[0];
        }
        
        public function getConsultantId($username){

            $sql = "SELECT id FROM consultants WHERE username = :username";
    
            $values = array(
                array(':username', $username)
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

        public function featuredConsultants() {
            $sql = "SELECT * FROM consultants WHERE featured = :featured";
            $values = array( array(":featured", "1") );
            $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
            return $result;
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

        public function addPaymentMethods($methods, $id) {
            $sql = "UPDATE consultants
                    SET payment_methods = :payment_methods
                    WHERE id = :id";
            // $sql = "INSERT INTO consultants ( payment_methods ) VALUES (:payment_methods) WHERE id = :id";
    
            $values = array(
                            array(":payment_methods", serialize($methods)),
                            array(":id", $id));

            $this->db->queryDB($sql, Database::EXECUTE, $values);
        }

        public function getPaymentMethods($id) {
            $sql = "SELECT payment_methods FROM consultants WHERE id = :id";
            $values = array( array(":id", $id) );
            $result =  $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
            // return $result;
            return unserialize($result['payment_methods']);
        }


        public function changeAvailablity($id, $availablity) {
                $sql = "UPDATE consultants
                        SET availablity = :availablity
                        WHERE id = :id";
        
                $values = array(
                                array(":availablity", $availablity),
                                array(":id", $id));
    
                $this->db->queryDB($sql, Database::EXECUTE, $values);
        }

        public function getListOfConsultants() {
            $sql = "SELECT id, username, email, consultant_type, rating, profile_image, city, state FROM consultants where availablity = :availablity";
            $values = array( array(":availablity", "available") );
            $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
            return $result;
        }

        public function addReview($id, $oldRating, $rating) {
            $newRating = $rating + $oldRating;
            $sql = "UPDATE consultants SET rating = :rating WHERE id = :id";
            $values = array ( array(":rating", $newRating), array(":id", $id) );
            $this->db->queryDB($sql, Database::EXECUTE, $values["id"]);
        }


    }


