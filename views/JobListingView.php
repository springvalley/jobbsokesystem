<?php
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
// require_once "./controllers/JobListingController.php";
require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";

class JobListingView {

    private $helper;

    public function __construct()
    {
        $this->helper = new Helper();
    }

    public function fetchAllLocations()
    {
        
        $locations = $this->helper->getAllLocations();

        return $locations;
    }

    public function fetchAllJobTypes()
    {       
        $jobtypes = $this->helper->getAllJobTypes();
        return $jobtypes;
    }

    public function fetchAllIndustries()
    {
        $industries = $this->helper->getAllIndustries();
        return $industries;
    }

    public function check_input_errors ()
    {
        if (isset($_SESSION["errors_postnewjob"])) {
            $errors = $_SESSION["errors_postnewjob"];
            echo "<br>";

            // foreach ($errors as $error) {
            //     echo "<div class= 'alert alert-danger'>" . $error . "</div>";
            // }

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
                // if(isset($errors["empty_applicationDeadline"])) {
                //     echo "<div class= 'alert alert-danger'>" . $errors["empty_select_applicationDeadline"] . "</div>";
                // }
                if(isset($errors["empty_select_applicationDeadline"])) {
                    echo "<div class= 'alert alert-danger'>" . $errors["empty_select_applicationDeadline"] . "</div>";
                }
            }
            
            
           
            // if(isset($errors["empty_positionName"])) {
            //     echo "<div class= 'alert alert-danger'>" . $errors["empty_positionName"] . "</div>";
            // }
            // if(isset($errors["empty_select_location"])) {
            //     echo "<div class= 'alert alert-danger'>" . $errors["empty_select_location"] . "</div>";
            // }
            // if(isset($errors["empty_select_industry"])) {
            //     echo "<div class= 'alert alert-danger'>" . $errors["empty_select_industry"] . "</div>";
            // }
            // if(isset($errors["empty_select_jobType"])) {
            //     echo "<div class= 'alert alert-danger'>" . $errors["empty_select_jobType"] . "</div>";
            // }
            // if(isset($errors["empty_select_jobType"])) {
            //     echo "<div class= 'alert alert-danger'>" . $errors["empty_select_jobType"] . "</div>";
            // }
            // if(isset($errors["empty_select_applicationDeadline"])) {
            //     echo "<div class= 'alert alert-danger'>" . $errors["empty_select_applicationDeadline"] . "</div>";
            // }
            //Reason to set 'unset SESSION variable' here because as soon as we have data inside our assessing variable, we do not want to have them anymore, so just make sure that we delete them.
            unset($_SESSION["errors_postnewjob"]); 
        } else if(isset($_GET["postnewjob"]) && $_GET["postnewjob"] === "success") {
            echo "<br>";
            echo "<div class= 'alert alert-success'>" . "Post New Job Ad Success" . "</div>";

        }
    }
}