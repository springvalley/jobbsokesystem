<?php

require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";

class UserModel{
    private $db;

    public function __construct()
    {
        $this->db = new DB_Handler;
    }

    public function findUserByMatch($email, $phone, $orgNumber, $isJobApplicant){
        //Vi gjør denne sjekken for å sjekke om vi skal finne en jobbsøker eller en arbeidsgiver.
        if($isJobApplicant == 1){
            $this->db->query("SELECT * FROM jobapplicant WHERE email = :email OR phone_number = :phone");
            $this->db->bind(":email", $email);
            $this->db->bind(":phone", $phone);
        }else{
            $this->db->query("SELECT * FROM employer WHERE email = :email OR phone_number = :phone OR orgNumber = :orgNumber");
            $this->db->bind(":email", $email);
            $this->db->bind(":phone", $phone);
            $this->db->bind(":orgNumber", $orgNumber);
        }

        $row = $this->db->fetchSingleRow();

        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function registerUser($data){
        if($data["jobApplicant"] == 1){
           $this->db->query("INSERT INTO jobapplicant(name, email, phone_number, password, location_id, educationlevel_id) VALUES (:name,:email,:phone,:password, :location_id, :educationlevel_id);");
           $this->db->bind(":name", $data["userName"]);
            $this->db->bind(":email", $data["userEmail"]);
            $this->db->bind(":phone", $data["userPhone"]);
            $this->db->bind(":password", $data["userPassword"]);
            $this->db->bind(":location_id", $data["location"]);
            $this->db->bind(":educationlevel_id", $data["education"]);
        }else{
            $this->db->query("INSERT INTO employer(company_name, email, phone_number, password, orgNumber, location_id, industry_id) VALUES (:name,:email,:phone,:password,:orgNumber, :location_id, :industry_id);");
            $this->db->bind(":name", $data["userName"]);
             $this->db->bind(":email", $data["userEmail"]);
             $this->db->bind(":phone", $data["userPhone"]);
             $this->db->bind(":password", $data["userPassword"]);
             $this->db->bind(":location_id", $data["location"]);
             $this->db->bind(":industry_id", $data["industry"]);
             $this->db->bind(":orgNumber", $data["userOrgNumber"]);
        }
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login($email, $password, $isJobApplicant){
        $row = $this->findUserByMatch($email, 0, 0, $isJobApplicant);

        if($row == false){
            return false;
        }

        $hashedPassword = $row->password;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

}