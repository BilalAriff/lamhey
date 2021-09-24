<?php

class ConsultantProfile {


    // 1. Get Consultant Profile Details
    // 2. Get All Events By Consultant
    // 3. Block Consultant
    
    protected $db;
    private $profileID;
    private $ponsultantDetails;
    private $ponsultantEvents;
    private $ponsultantVideoPortfolio;
    private $ponsultantPhotoPortfolio;

    public function __construct($_profileID){
        
        $this->db = new Database();
        $this->profileID = $_profileID;
    }
    
    public function getConsultantProfileDetails($id) {
        $sql = "SELECT id, username, email, consultant_type, rating, about, profile_image, firstname, lastname, address, city, state, zip FROM consultants WHERE id = :id";

        $values = array(
            array(':id', $id)
        );

        $allEvents = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        
        return $allEvents;
    }
}

