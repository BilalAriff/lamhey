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


    public function createEvent($pTitle, $pThumbnail, $pEventPrice, $pHost, $pHostAvatar, $eventHostName, $pDescription, $pCategories) {
        $sql = "INSERT INTO events (
                                    event_title,	
                                    event_thumbnail,
                                    event_price,	
                                    event_host,
                                    event_host_avatar,
                                    event_host_name,	
                                    event_description,	
                                    event_categories)
                            VALUES (	
                                    :event_title,	
                                    :event_thumbnail,
                                    :event_price,	
                                    :event_host,
                                    :event_host_avatar,
                                    :event_host_name,	
                                    :event_description,	
                                    :event_categories)";
        
                $values = array(
                    array(':event_title', $pTitle),
                    array(':event_thumbnail', $pThumbnail),
                    array(':event_price', $pEventPrice),
                    array(':event_host', $pHost),
                    array(':event_host_avatar', $pHostAvatar),
                    array(':event_host_name', $eventHostName),
                    array(':event_description', $pDescription),
                    array(':event_categories', $pCategories));

                    $this->db->queryDB($sql, Database::EXECUTE, $values);
    }


    public function getEvent($eventID) {
        $sql = "SELECT * FROM events WHERE event_id = :event_id";

        $values = array( array(":event_id", $eventID) );
        $result =  $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        return $result;
    }


    public function getEventList() {
        $sql = "SELECT * FROM events";

        $result =  $this->db->queryDB($sql, Database::SELECTALL);
        return $result;
    }


    public function getEventListByConsultant($consultantID) {
        $sql = "SELECT * FROM events WHERE event_host = :event_host";

        $values = array( array(":event_host", $consultantID) );
        $result =  $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;

    }

    public function getFeaturedEvents() {
        $sql = "SELECT * FROM events WHERE event_featured = :event_featured";

        $values = array( array(":event_featured", "1") );
        $result =  $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }

   public function updateEventName($eventTitle, $eventID) {
        $sql = "UPDATE events SET event_title = :event_title WHERE event_id = :event_id";

        $values = array( array(":event_title", $eventTitle),
                        array(":event_id", $eventID));
        $this->db->queryDB($sql, Database::EXECUTE, $values);
   }


    public function updateEventDescription($eventDescription, $eventID) {
        $sql = "UPDATE events SET event_description = :event_description WHERE event_id = :event_id";

        $values = array( array(":event_description", $eventDescription),
                        array(":event_id", $eventID));
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function updateEventPricing($eventPrice, $eventID) {
        $sql = "UPDATE events SET event_price = :event_price WHERE event_id = :event_id";

        $values = array( array(":event_price", $eventPrice),
                        array(":event_id", $eventID));
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function updateEventCategories($eventCategories, $eventID) {
        $sql = "UPDATE events SET event_categories = :event_categories WHERE event_id = :event_id";

        $values = array( array(":event_categories", $eventCategories),
                        array(":event_id", $eventID));
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function updateEventThumbnail($eventThumbnail, $eventID) {
        $sql = "UPDATE events SET event_thumbnail = :event_thumbnail WHERE event_id = :event_id";

        $values = array( array(":event_thumbnail", $eventThumbnail),
                        array(":event_id", $eventID));
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

}

