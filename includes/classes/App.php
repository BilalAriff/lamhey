<?php

class App {
    
    protected $db;
    private $alertMsg;

    public function __construct(){
        $this->db = new Database();
    }

    public function protectedView() {}
    public function alertMsg($msg) {
        $this->alertMsg = $msg;
    }

    public function isProfileBlocked($username, $table) {
        $sql = "SELECT profile_status FROM $table WHERE username = :username";
        $values = array( array(":username", $username));
        $result =  $this->db->queryDB($sql, DATABASE::SELECTSINGLE, $values);

        return $result;
    }

    public function isEventBookedTest($eventId, $userId){
            
        $sql = "SELECT count(booking_id) AS num FROM bookings WHERE booking_user = :booking_user AND booking_event = :booking_event";
        
        $values = array( array(":booking_user", $userId), array(':booking_event', $eventId));
    
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);

        if ($result['num'] == 0)
            return false;
        else
            return true;                
        
    }

    public function isEventBooked($eventId, $userId) {
        $sql = "SELECT booking_id FROM bookings WHERE booking_user = :booking_user AND booking_event = :booking_event";
        $values = array( array(":booking_user", $userId), array(':booking_event', $eventId));
        $result =  $this->db->queryDB($sql, DATABASE::SELECTSINGLE, $values);

        // if($result == "false") {
        //     return false;
        // } else {
        //     return true;
        // }

        return $result;

    }

    public function getUserComplaints($username) {
        $sql = "SELECT * FROM complaint WHERE username = :username";
        $values = array( array(":username", $username) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }

    public function getPaymentMethodsList() {
        $sql = "SELECT * FROM payment_methods";
        $result =  $this->db->queryDB($sql, DATABASE::SELECTALL);
        return $result;
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM Categories";
        $result = $this->db->queryDB($sql, Database::SELECTALL);
        return $result;
    }

    public function eventsByCategory($category) {
        $sql = "SELECT * FROM events WHERE category = :category";
        $values = array( array(":categoy", $category) );
        $result = $this->db->queryDB($sql, Database::SELECTALL);
        return $result;
    }


    public function searchConsultants($input) {
          
        $sql = "SELECT * FROM consultants WHERE (username LIKE '%$input%' OR email LIKE '%$input%' OR firstname LIKE '%$input%' OR lastname LIKE '%$input%' OR address LIKE '%$input%' OR city LIKE '%$input%' OR state LIKE '%$input%')";
        $result = $this->db->queryDB($sql, Database::SELECTALL);
        return $result;

    }

    public function searchConsultantsByCategory($category) {
        $sql = "SELECT * FROM consultants WHERE categories = :categories";
        $values = array( array(":categories", $category) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }
    
    public function searchEvents($input) {        
        $sql = "SELECT * FROM events WHERE (event_title LIKE '%$input%' OR event_host_name LIKE '%$input%' OR event_categories LIKE '%$input%')";
        $result = $this->db->queryDB($sql, Database::SELECTALL);
        return $result;
    }

    public function searchEventsByCategory($category) {
        $sql = "SELECT * FROM events WHERE event_categories = :event_categories";
        $values = array( array(":event_categories", $category) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }
}

