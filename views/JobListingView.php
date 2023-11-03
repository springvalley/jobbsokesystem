<?php
/**
 * JobListingView is a class responsible for managing all operations that related to job advertisements, 
 * including showing errors message to the user and interacting with the 'Helper' class for retrieving data from database.
 * @since 0.5.0
 * @see Helper classe that is used by JobListingView. 
 */

require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";

class JobListingView {

    private $helper;
    private $jobListingModel;

    //Constructor
    public function __construct()
    {
        $this->helper = new Helper();
        $this->jobListingModel = new JobListingModel();
    }

      /**
     * This function is used to get all job advertisements.     
     * @return array A list of job advertisements.
     */
    public function fetchAllJobAds()
    {
        $jobAds = $this->helper->getAllJobListings();
        return $jobAds;
    }

    public function fetchAllJobAdsByEmployerId($employerId)
    {
        $jobAdsByEmployer = $this->jobListingModel->getAllJobListingsByEmployer($employerId);
        // return $jobAdsByEmployer;
        if (empty($jobAdsByEmployer)) {
            return null; //Need to fix this one!!!!!
        } else {
            return $jobAdsByEmployer;
        }
        // var_dump($jobAdsByEmployer); // Debugging output
    }
    

    /**
     * This function is used to get all locations.     
     * @return array A list of locations.
     */
    public function fetchAllLocations()
    {
        
        $locations = $this->helper->getAllLocations();

        return $locations;
    }

     /**
     * This function is used to get all job types.     
     * @return array A list of job types.
     */
    public function fetchAllJobTypes()
    {       
        $jobtypes = $this->helper->getAllJobTypes();
        return $jobtypes;
    }

     /**
     * This function is used to get all industries.     
     * @return array A list of industries.
     */
    public function fetchAllIndustries()
    {
        $industries = $this->helper->getAllIndustries();
        return $industries;
    }

     /**
     * This function is used to check for and displays errors messages related to posting a new job advertisement.  
     * This function retrieves errors messages from the session and displays them as alerts.
     * It also displays a success message if a new job advertisement was successfully created.
     */
    public function check_input_errors ()
    {
        if (isset($_SESSION["errors_postnewjob"])) {
            $errors = $_SESSION["errors_postnewjob"];
            echo "<br>";           

                switch (true) {
                    case isset($errors["not_login"]):
                        echo "<div class= 'alert alert-danger'>" . $errors["not_login"] . "</div>";
                        break;

                    case isset($errors["empty_form"]):
                        echo "<div class= 'alert alert-danger'>" . $errors["empty_form"] . "</div>";
                        break;
                    
                    case isset($errors["empty_select_location"]):
                        echo "<div class= 'alert alert-danger'>" . $errors["empty_select_location"] . "</div>";
                        break;
                    
                    case isset($errors["empty_select_industry"]):
                        echo "<div class= 'alert alert-danger'>" . $errors["empty_select_industry"] . "</div>";
                        break;
                    
                    case isset($errors["empty_select_jobType"]):
                        echo "<div class= 'alert alert-danger'>" . $errors["empty_select_jobType"] . "</div>";
                        break;

                    case isset($errors["empty_applicationDeadline"]):
                        echo "<div class= 'alert alert-danger'>" . $errors["empty_applicationDeadline"] . "</div>";
                        break;
                    
                    case isset($errors["invalid_applicationDeadline"]):
                        echo "<div class= 'alert alert-danger'>" . $errors["invalid_applicationDeadline"] . "</div>";
                        break;
                }
        
            //Reason to unset SESSION variable because as soon as we have data inside our assessing variable, we do not want to have them anymore, so just make sure that we delete them.                  
            unset($_SESSION["errors_postnewjob"]); 

        } else if(isset($_GET["postnewjob"]) && $_GET["postnewjob"] === "success") {
            echo "<br>";
            echo "<div class= 'alert alert-success'>" . "Din jobbannonse har blitt publisert!" . "</div>";

        }
    }
}