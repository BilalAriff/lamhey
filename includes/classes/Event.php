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
    
    public function getAllEvents() {
        $sql = "SELECT * FROM event";

        $values = array(
            array(':event', "event")
        );

        $allEvents = $this->db->queryDB($sql, Database::SELECTALL, $values);
        
        return $allEvents;
    }
}

