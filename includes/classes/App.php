<?php

class App {
    
    protected $db;
    protected $alertMsg;

    public function __construct(){
        $this->db = new Database();
    }

    public function protectedView() {}
    public function alertMsg() {}

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

