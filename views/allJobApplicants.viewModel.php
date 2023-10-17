<?php
include "models\jobApplicant.model.php";
include "models\jobApplicant.viewModel.php";
class allJobApplicantsViewModel extends JobApplicantModel{
    private $amountOfJobApplicants;
    private $topJobApplicant;
    private $allJobApplicants;
    
    public function __construct()
    {
        parent::__construct();
        $this->amountOfJobApplicants = (int)$this->getNumberOfJobApplicantsInDB();
        $this->topJobApplicant = (int)$this->getTopJobApplicantInDB();
        $this->allJobApplicants = array();
        array_push($this->allJobApplicants, new JobApplicantViewModel(10));
        array_push($this->allJobApplicants, new JobApplicantViewModel(11));
        array_push($this->allJobApplicants, new JobApplicantViewModel(12));
        
        for($i = $this->topJobApplicant; $i < $this->topJobApplicant + $this->amountOfJobApplicants; $i++){
            parent::__construct($i);
            array_push($this->allJobApplicants, new JobApplicantViewModel($i));
        }
    }

    public function getAllJobApplicants(){
        return $this->allJobApplicants;
    }
    public function getTopJobApplicant(){
        return $this->topJobApplicant;
    }

    public function getNumberOfJobApplicants(){
        return $this->amountOfJobApplicants;
    }
}