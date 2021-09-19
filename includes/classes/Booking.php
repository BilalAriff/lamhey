<?php

class Booking {
    
    protected $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function bookEvent($eventId, $description, $consultant, $user, $date) {
        $sql = "INSERT INTO bookings (booking_event, booking_description, booking_consultant, 
                                      booking_user, booking_date)
                VALUES (:booking_event, :booking_description, :booking_consultant, 
                        :booking_user, :booking_date)";

        $values = array(
                        array(":booking_event", $eventId),
                        array(":booking_description", $description),
                        array(":booking_consultant", $consultant),
                        array(":booking_user", $user),
                        array(":booking_date", $date));

        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function getBooking($id) {
        $sql = "SELECT * FROM bookings WHERE booking_id = :id";
        $values = array( array(":id", $id) );
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        return $result;
    }


    public function getUserBookingList($id) {
        $sql = "SELECT * FROM bookings WHERE booking_user = :id";
        $values = array( array(":id", $id) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }


    public function getConsultantBookingList($id) {
        $sql = "SELECT * FROM bookings WHERE booking_consultant = :id";
        $values = array( array(":id", $id) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }

    public function getBookingListByEvent($id) {
        $sql = "SELECT * FROM bookings WHERE booking_event = :id";
        $values = array( array(":id", $id) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }
    public function changeBookingStatus($id, $status) {
        $sql = "UPDATE bookings SET booking_status = :booking_status WHERE booking_id = :id";
        $values = array( array(":id", $id), array(":booking_status", $status) );
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function getAllBookingList() {
        $sql = "SELECT * FROM bookings";
        $result = $this->db->queryDB($sql, Database::EXECUTE);
        return $result;
    }
    public function getBookingListByDate() {}
}

