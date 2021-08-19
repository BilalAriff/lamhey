<?php

class Event {
    
    protected $db;
    private $eventName;
    private $eventDescription;
    private $eventHost;
    private $eventCategory;

    public function __construct($_eventName){
        
        $this->db = new Database();
        $this->eventName = $_eventName;
    }    

    // ================================================


    // public function createEvent($_eventName, $_eventDescription, $_eventHost, $_eventCategory){
            
    //     $sql = "INSERT INTO event ( eventName, eventDescription, eventHost, eventCategory ) VALUES (:eventName, :eventDescription, :eventHost, :eventCategry)";
        
    //     $values = array(
    //         array(':eventName', $_eventName),
    //         array(':eventDescription', $_eventDescription),
    //         array(':eventHost', $_eventHost),
    //         array(':eventCategory', $_eventCategory),
    //     );

    //     $this->db->queryDB($sql, Database::EXECUTE, $values);
    // }

    // ===================================================

    public function createEvent($pEventName, $pEventHost, $pEventCategory, $pEventDescription, $pEventImage){
            
        $sql = "INSERT INTO event (eventName, eventHost, eventCategory, eventDescription, eventImage)
                VALUES (:eventName, :eventHost, :eventCategory, :eventDescription, :eventImage)";
        
        $values = array(
            array(':eventName', $pEventName),
            array(':eventHost', $pEventHost),
            array(':eventCategory', $pEventCategory),
            array(':eventDescription', $pEventDescription),
            array(':eventImage', $pEventImage)
        );

        $this->db->queryDB($sql, Database::EXECUTE, $values);

    }    
}

