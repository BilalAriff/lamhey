<?php

    class CustomEvent {

        protected $db;
        
        public function __construct() {
            $this->db = new Database();
        }

        public function requestForEvent($userId, $username, $consultantId, $consultantName,
                                        $eventDescription, $eventDate) {
            $sql = "INSERT INTO custom_event_request (user_id, username, consultant_id,
                                                    consultant_name, event_description, event_date)
                    VALUES (:user_id, :username, :consultant_id,
                            :consultant_name, :event_description, :event_date)";
            $values = array( array(":user_id", $userId),
                             array(":username", $username),
                             array(":consultant_id", $consultantId),
                             array(":consultant_name", $consultantName),
                             array(":event_description", $eventDescription),
                             array(":event_date", $eventDate));

            $this->db->queryDB($sql, Database::EXECUTE, $values);
        }

        public function manageCustomRequest($eventStatus, $id) {
            $sql = "UPDATE custom_event_request SET event_status = :event_status WHERE id = :id";
            $values = array( array(":event_status", $eventStatus), array( ":id", $id ) );
            $this->db->queryDB($sql, Database::EXECUTE, $values);
        }

        public function getUserCustomRequest($userId) {
            $sql = "SELECT * FROM custom_event_request WHERE user_id = :user_id";
            $values = array( array(":user_id", $userId) );
            $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
            return $result;
        }

        public function getCustomRequestById($id) {
            $sql = "SELECT * FROM custom_event_request WHEREnid = :id";
            $values = array( array(":id", $id) );
            $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
            return $result;
        }

    }