<?php

    class Complaint {
        
        public function __construct(){
            $this->db = new Database();
        }
    
        public function lodgeComplaint($user_id, $username, 
                                        $consultant_id, $consultant_name, 
                                        $description, $feedback) {
            $sql = "INSERT INTO complaint
                    ( user_id, username, consultant_id, consultant_name, description, feedback)
                    VALUES (:user_id, :username, :consultant_id, :consultant_name, :description, :feedback)";
            $values = array(
                      array(":user_id", $user_id),
                      array(":username", $username),
                      array(":consultant_id", $consultant_id),
                      array(":consultant_name", $consultant_name),
                      array(":description", $description),
                      array(":feedback", $feedback));
            $this->db->queryDB($sql, Database::EXECUTE, $values);

        }
        public function getComplaint() {}
        public function getComplaintFromUser() {}
        public function lodgeComplaintFromConsultant() {}
        public function getComplaintList() {}
    }