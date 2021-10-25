<?php

class Admin extends User {

    private $username;
    
    protected $db;
    protected $role;

    public function __construct($pUsername){
        
        $this->db = new Database();
        $this->username = $pUsername;
        $this->role = "admin";
    }    

    public function isDuplicateID(){
            
        $sql = "SELECT count(username) AS num FROM admin WHERE username = :username";
        
        $values = array(
            array(':username', $this->username)
        );
    
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);

        if ($result['num'] == 0)
            return false;
        else
            return true;                
        
    }

    public function getUsername(){

        $sql = "SELECT username FROM admin WHERE username = :username";

        $values = array(
            array(':username', $this->username)
        );
    
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        
        return $result['username'];
    }
    
    public function isValidLogin($pPassword){
        $sql = "SELECT password FROM admin WHERE username = :username";
        
        $values = array(
            array(':username', $this->username)
        );

        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        
        if (isset($result['password']) && password_verify($pPassword, $result['password']))
            return true;
        else
            return false;

    }

    public function getAdminId($username) {
        $sql = "SELECT id FROM admin WHERE username = :username";
        $values = array( array(":username", $username) );
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        return $result["id"];
    }

    public function getAdminData(){

        $sql = "SELECT * FROM admin WHERE username = :username";

        $values = array(
            array(':username', $this->username)
        );
    
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        
        return $result[0];
    }

    public function getAdminProfileInfo($username) {

        $sql = "SELECT 	
                        id,
                        username,
                        email, 
                        profile_image,
                        firstname,
                        lastname,
                        password,
                        role,
                        address,
                        city,
                        state,
                        zip
        FROM admin WHERE username = :username";

        $values = array(
            array(':username', $this->username)
        );

        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result[0];
        
    }

    public function getAdminProfileImage($username) {
        $sql = "SELECT profile_image FROM admin WHERE username = :username";
        $values = array( array(":username", $username) );
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        return $result["profile_image"];
    }

    public function createAdminProfile($pUsername, $pProfileImage, $pEmail, $pFirstname, $pLastname, $pPassword, $pRole, $pAddress, $pCity, $pZip, $pState){
            
        $sql = "INSERT INTO admin (username, profile_image, email, firstname, lastname, password, role, address, city, zip, state)
                VALUES (:username, :profile_image, :email, :firstname, :lastname, :password, :role,
                        :address, :city, :zip, :state)";
        
        $values = array(
            array(':username', $pUsername),
            array(':profile_image', $pProfileImage),
            array(':email', $pEmail),
            array(':firstname', $pFirstname),
            array(':lastname', $pLastname),
            array(':password', password_hash($pPassword, PASSWORD_DEFAULT)),
            array(':role', $pRole),
            array(':address', $pAddress),
            array(':city', $pCity),
            array(':zip', $pZip),
            array(':state', $pState)
        );

        $this->db->queryDB($sql, Database::EXECUTE, $values);

    }


    // ======================= ADMIN REQUIRED FUNCTIONALITY =====================

    public function getBookingList() {
        $sql = "SELECT * FROM bookings";
        // $values = array( array(":username", $username) );
        $result = $this->db->queryDB($sql, Database::SELECTALL);
        return $result;
    }

    public function getCustomBookingList() {
        $sql = "SELECT * FROM custom_event_request";
        // $values = array( array(":username", $username) );
        $result = $this->db->queryDB($sql, Database::SELECTALL);
        return $result;
    }

    public function getBookingReport($start_date, $end_date ) {
        $sql = "SELECT * FROM bookings WHERE booking_date BETWEEN :start_date AND :end_date";
        $values = array( array(":start_date", $start_date), array("end_date", $end_date) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }

    public function getCustomBookingReport($start_date, $end_date ) {
        $sql = "SELECT * FROM custom_event_request WHERE event_date BETWEEN :start_date AND :end_date";
        $values = array( array(":start_date", $start_date), array("end_date", $end_date) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }

    public function blockUser($userID) {
        $sql = "UPDATE users SET profile_status = :status WHERE id = :userID";
        $values = array( array(":userID", $userID), array(":status", "block") );
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function getBlockedUserList() {
        $sql = "SELECT id, username, profile_status FROM users WHERE profile_status = :profile_status";
        $values = array( array( ":profile_status", "blocked" ) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }

    public function unblockUser($userID) {
        $sql = "UPDATE users SET profile_status = :status WHERE id = :userID";
        $values = array( array(":userID", $userID), array(":status", "fine") );
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function blockConsultant($consultantID) {
        $sql = "UPDATE consultants SET profile_status = :status WHERE id = :userID";
        $values = array( array(":userID", $consultantID), array(":status", "blocked") );
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function getBlockedConsultantList() {
        $sql = "SELECT id, username, profile_status, consultant_type FROM consultants WHERE profile_status = :profile_status";
        $values = array( array( ":profile_status", "blocked" ) );
        $result = $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }

    public function unblockConsultant($consultantID) {
        $sql = "UPDATE consultants SET profile_status = :status WHERE id = :userID";
        $values = array( array(":userID", $consultantID), array(":status", "fine") );
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function getComplaintList() {
        $sql = "SELECT * FROM complaint";
        $result = $this->db->queryDB($sql, Database::SELECTALL);
        return $result;
    }

    public function getComplaint($complaintID) {
        $sql = "SELECT * FROM complaint WHERE id = :id";
        $values = array( array(":id", $complaintID) );
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        return $result;
    }

    public function updateComplaintFeedback($complaintID, $complaintFeedback) {
        $sql = "UPDATE complaint SET feedback = :feedback WHERE id = :id";
        $values = array( array(":feedback", $complaintFeedback), array(":id", $complaintID));
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function updateComplaintStatus($complaintID, $complaintStatus) {
        $sql = "UPDATE complaint SET status = :status WHERE id = :id";
        $values = array( array(":status", $complaintStatus), array(":id", $complaintID));
        $result = $this->db->queryDB($sql, Database::EXECUTE, $values);
    }
    
    public function addCategory($categoryName) {
        $sql = "INSERT INTO Categories (name) VALUES (:name)";
        $values = array( array(":name", $categoryName) );
        $this->db->queryDB($sql, Database::EXECUTE, $values);    
    }

    public function getCategory($id) {
        $sql = "SELECT * FROM Categories WHERE id = :id";
        $values = array( array(":id", $id) );
        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        return $result;
    }

    public function getCategoryList() {
        $sql = "SELECT * FROM Categories";
        $result = $this->db->queryDB($sql, Database::SELECTALL);
        return $result;
    }

    public function removeCategory($id) {
        $sql = "DELETE FROM Categories WHERE id = :id";
        $values = array( array(":id", $id) );
        $this->db->queryDB($sql, Database::EXECUTE, $values);
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

    public function addPaymentMethods($paymentMethods) {
        $payments = serialize($paymentMethods);
        echo $payments;
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

    public function featureEvent($featured, $eventId) {
        $sql = "UPDATE events SET event_featured = :event_featured WHERE event_id = :event_id";
        $values = array( array(':event_featured', $featured), array(':event_id', $eventId) );
        $this->db->queryDB($sql, DATABASE::EXECUTE, $values);
    }

    public function featureConsultant($featured, $id) {
        $sql = "UPDATE consultants SET featured = :featured WHERE id = :id";
        $values = array( array(':featured', $featured), array(':event_id', $id) );
        $this->db->queryDB($sql, DATABASE::EXECUTE, $values);
    }

}
