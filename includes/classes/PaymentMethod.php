<?php

class PaymentMethod {
    
    protected $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function addPaymentMethod($name, $icon) {

        $sql = "INSERT
                INTO payment_methods ( pm_name, pm_icon ) 
                VALUES (:pm_name, :pm_icon)";
        
        $values = array(
            array(":pm_name", $name),
            array(":pm_icon", $icon));

        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }


    public function getPaymentMethod($id) {
        $sql = "SELECT * FROM payment_methods WHERE pm_id = :pm_id";
        $values = array( array(":pm_id", $id));
        $result =  $this->db->queryDB($sql, DATABASE::SELECTSINGLE, $values);
        return $result;
    }

    public function removePaymentMethod($id) {
        $sql = "DELETE FROM payment_methods WHERE pm_id = :pm_id";
        $values = array( array(":pm_id", $id));
        $result =  $this->db->queryDB($sql, DATABASE::EXECUTE, $values);
    }
    
    public function getPaymentMethodsList() {
        $sql = "SELECT * FROM payment_methods";
        $result =  $this->db->queryDB($sql, DATABASE::SELECTALL);
        return $result;
    }
}