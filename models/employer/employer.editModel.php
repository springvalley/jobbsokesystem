
<?php
require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";
class EmployerEditModel extends EmployerModel
{
    private $helper;
    private $employer_id;
    private $company_name;
    private $email;
    private $phoneNumber;
    private $location_name;
    private $industry_name;
    private $profilePicture;
    private $orgNumber;
    private $locations = array();
    private $summary;
    private $allData;

    public function __construct($employer_id)
    {
        parent::__construct();
        $this->helper = new Helper();
        $this->employer_id = $employer_id;
        $jobApplicantData = $this->getEmployerProfile($employer_id);
        $this->company_name = $jobApplicantData->company_name;
        $this->email = $jobApplicantData->email;
        $this->phoneNumber = $jobApplicantData->phone_number;
        $this->location_name = $jobApplicantData->location_name;
        $this->industry_name = $jobApplicantData->industry_name;
        $this->profilePicture = $jobApplicantData->location_name;
        $this->orgNumber = $jobApplicantData->orgNumber;
        $this->locations = $this->helper->getAllLocations();
        $this->summary = $jobApplicantData->summary;
        $this->allData = $jobApplicantData;
    }


    public function getAll()
    {
        return $this->allData;
    }
    public function getLocations(){
        return $this->locations;
    }

    public function getEmployer_id()
    {
        return $this->employer_id;
    }

    public function getCompanyName()
    {
        return $this->company_name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhonenumber()
    {
        return $this->phoneNumber;
    }
    public function getLocation_name()
    {
        return $this->location_name;
    }
    public function getIndustryName()
    {
        return $this->industry_name;
    }
    public function getOrganizationNumber()
    {
        return $this->orgNumber;
    }
    public function getSummary()
    {
        return $this->summary;
    }
}
