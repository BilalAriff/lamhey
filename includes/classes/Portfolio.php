<?php

class Portfolio {
    
    protected $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function createPortfolio( $pTitle, $pLink, $pDescription, $pConsultant, $pCategories, $pDate, $pType ) {
        $sql = "INSERT 
                INTO portfolio ( portfolio_title, portfolio_link, portfolio_description, portfolio_consultant, portfolio_categories, portfolio_date, portfolio_type )
                VALUES ( :portfolio_title, :portfolio_link, :portfolio_description, :portfolio_consultant, :portfolio_categories, :portfolio_date, :portfolio_type)";
        
                $values = array(
                    array(':portfolio_title', $pTitle),
                    array(':portfolio_link', $pLink),
                    array(':portfolio_description', $pDescription),
                    array(':portfolio_consultant', $pConsultant),
                    array(':portfolio_categories', $pCategories),
                    array(':portfolio_date', $pDate),
                    array(':portfolio_type', $pType));

                    $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

    public function getSinglePortfolio($portfolioID, $consultantID) {
        $sql = "SELECT * FROM portfolio WHERE portfolio_id = :portfolio_id AND portfolio_consultant = :id";

        $values = array( array(":id", $consultantID), array(":portfolio_id", $portfolioID));
        $result =  $this->db->queryDB($sql, Database::SELECTSINGLE, $values);
        return $result;
    }

    public function getConsultantVideoPortfolio($consultantID) {
        $sql = "SELECT * FROM portfolio WHERE portfolio_consultant = :id AND portfolio_type = :type";

        $values = array( array(":id", $consultantID), array(":type", "video"));
        $result =  $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    }

    public function getConsultantPhotoPortfolio($consultantID) {
        $sql = "SELECT * FROM portfolio WHERE portfolio_consultant = :id AND portfolio_type = :type";

        $values = array( array(":id", $consultantID), array(":type", "photo"));
        $result =  $this->db->queryDB($sql, Database::SELECTALL, $values);
        return $result;
    
    
    
    }

    public function updateEventName($id, $title, $link, $description, $categories, $date, $type) {
        $sql = "UPDATE portfolio
                SET portfolio_title = :portfolio_title,
                    portfolio_link = :portfolio_link,
                    portfolio_description = :portfolio_description,
                    portfolio_categories = :portfolio_categories,
                    portfolio_date = :portfolio_date,
                    portfolio_type = :portfolio_type
                WHERE portfolio_id = :portfolio_id";

        $values = array( array(":portfolio_title", $title ),
                         array(":portfolio_link", $link ),
                         array(":portfolio_description", $description),
                         array(":portfolio_categories", $categories),
                         array(":portfolio_date", $date),
                         array(":portfolio_type", $type),
                         array(":portfolio_id", $id));
                         
        $this->db->queryDB($sql, Database::EXECUTE, $values);
    }

}

