<?php

class App {
    
    protected $db;
    protected $alertMsg;

    public function __construct(){
        $this->db = new Database();
    }

    public function protectedView() {}
    public function alertMsg() {}

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

    public function searchConsultants() {}
    public function searchConsultantsByCategory() {}
    public function searchEvents() {}
    public function searchEventsByCategory() {}

}

