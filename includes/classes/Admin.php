<?php

class Admin extends User {

    private $username;
    
    protected $db;
    protected $role;

    public function __construct($pUsername){
        
        $this->db = new Database();
        $this->username = $pUsername;
        $this->role = "admin";
    }    

    public function isDuplicateID(){
            
        $sql = "SELECT count(username) AS num FROM admin WHERE username = :username";
        
        $values = array(
            array(':username', $this->username)
        );
    
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);

        if ($result['num'] == 0)
            return false;
        else
            return true;                
        
    }

    public function getUsername(){

        $sql = "SELECT username FROM admin WHERE username = :username";

        $values = array(
            array(':username', $this->username)
        );
    
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        
        return $result['username'];
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

    public function getAdminId($username) {
        $sql = "SELECT id FROM admin WHERE username = :username";
        $values = array( array(":username", $username) );
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        return $result["id"];
    }

    public function getAdminData(){

        $sql = "SELECT * FROM admin WHERE username = :username";

        $values = array(
            array(':username', $this->username)
        );
    
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        
        return $result[0];
    }

    public function getAdminProfileInfo($username) {

        $sql = "SELECT 	
                        id,
                        username,
                        email, 
                        profile_image,
                        firstname,
                        lastname,
                        password,
                        role,
                        address,
                        city,
                        state,
                        zip
        FROM admin WHERE username = :username";

        $values = array(
            array(':username', $this->username)
        );

        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result[0];
        
    }

    public function getAdminProfileImage($username) {
        $sql = "SELECT profile_image FROM admin WHERE username = :username";
        $values = array( array(":username", $username) );
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        return $result["profile_image"];
    }

    public function createAdminProfile($pUsername, $pProfileImage, $pEmail, $pFirstname, $pLastname, $pPassword, $pRole, $pAddress, $pCity, $pZip, $pState){
            
        $sql = "INSERT INTO admin (username, profile_image, email, firstname, lastname, password, role, address, city, zip, state)
                VALUES (:username, :profile_image, :email, :firstname, :lastname, :password, :role,
                        :address, :city, :zip, :state)";
        
        $values = array(
            array(':username', $pUsername),
            array(':profile_image', $pProfileImage),
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
}
