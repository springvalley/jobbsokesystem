<?php
/**
 * JobListingView is a class responsible for managing all operations that related to job advertisements, 
 * including showing error message to the user and interacting with the 'Helper' class for retrieving data from database.
 * @since 0.5.0
 * @see Helper classe that is used by JobListingView. 
 */

require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";

class JobListingView {

    private $helper;

    //Constructor
    public function __construct()
    {
        $this->helper = new Helper();
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
     * This function is used to check for and displays error messages related to posting a new job advertisement.  
     * This function retrieves error messages from the session and displays them as alerts.
     * It also displays a success message if a new job advertisement was successfully created.
     */
    public function check_input_errors ()
    {
        if (isset($_SESSION["errors_postnewjob"])) {
            $errors = $_SESSION["errors_postnewjob"];
            echo "<br>";

            if(isset($errors["not_login"])) {
                echo "<div class= 'alert alert-danger'>" . $errors["not_login"] . "</div>";
            }
            if(isset($errors["empty_form"])) {
                echo "<div class= 'alert alert-danger'>" . $errors["empty_form"] . "</div>";
            } else {
                if (isset($errors["empty_select_location"])) {
                    echo "<div class= 'alert alert-danger'>" . $errors["empty_select_location"] . "</div>";
                } 
                if (isset($errors["empty_select_industry"])) {
                    echo "<div class= 'alert alert-danger'>" . $errors["empty_select_industry"] . "</div>";
                } 
                if(isset($errors["empty_select_jobType"])) {
                    echo "<div class= 'alert alert-danger'>" . $errors["empty_select_jobType"] . "</div>";
                }                
                if(isset($errors["empty_applicationDeadline"])) {
                    echo "<div class= 'alert alert-danger'>" . $errors["empty_applicationDeadline"] . "</div>";
                } elseif(isset($errors["invalid_applicationDeadline"])) {
                        echo "<div class= 'alert alert-danger'>" . $errors["invalid_applicationDeadline"] . "</div>";
                    }
            }  
            //Reason to unset SESSION variable because as soon as we have data inside our assessing variable, we do not want to have them anymore, so just make sure that we delete them.                  
            unset($_SESSION["errors_postnewjob"]); 

        } else if(isset($_GET["postnewjob"]) && $_GET["postnewjob"] === "success") {
            echo "<br>";
            echo "<div class= 'alert alert-success'>" . "Din jobbannonse har blitt publisert!" . "</div>";

        }
    }
}