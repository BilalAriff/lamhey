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

    // public function createEvent($pEventName, $pEventHost, $pEventCategory, $pEventDescription, $pEventImage){
            
    //     $sql = "INSERT INTO event (eventName, eventHost, eventCategory, eventDescription, eventImage)
    //             VALUES (:eventName, :eventHost, :eventCategory, :eventDescription, :eventImage)";
        
    //     $values = array(
    //         array(':eventName', $pEventName),
    //         array(':eventHost', $pEventHost),
    //         array(':eventCategory', $pEventCategory),
    //         array(':eventDescription', $pEventDescription),
    //         array(':eventImage', $pEventImage)
    //     );

    //     $this->db->queryDB($sql, Database::EXECUTE, $values);

    // }
    
    // public function getAllEvents() {
    //     $sql = "SELECT * FROM event";

    //     $values = array(
    //         array(':event', "event")
    //     );

    //     $allEvents = $this->db->queryDB($sql, Database::SELECTALL, $values);
        
    //     return $allEvents;
    // }
}

