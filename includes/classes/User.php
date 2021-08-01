<?php

class User {

    const USER = 1;
    const CONSULTANT = 2;
    
    protected $db;
    protected $role;

    public function __construct(){
        
        $this->db = new Database();
        $this->role = User::USER;
    }    

    
    public function createUserProfile($pUsername, $pEmail, $pFirstname, $pLastname, $pPassword, $pRole, $pAddress, $pCity, $pZip, $pState){
            
        $sql = "INSERT INTO users (username, email, firstname, 
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
}
