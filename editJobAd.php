<?php
include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "./models/jobListing/JobListingModel.php";
require_once "./controllers/JobListingController.php";
require_once "./views/JobListingView.php";
require_once "./library/errorhandler.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobListingId = (int)$_POST["jobListing_id"];
} else {
    $jobListingId = (int)$_GET["id"];
}
$jobListingView = new JobListingView();
$jobAdDetail = $jobListingView->fetchJobAdByJobListingId($jobListingId);
//initialized variable 'isLoggedInAsEmployer' to check if the current user is logged in as an employer.
$isLoggedInAsEmployer = false;
//initialized variable 'isJobAdOwner' to check if the logged in-employer is an owner of the job ad.
$isJobAdOwner = false;
if (isset($_SESSION["id"]) && $_SESSION["userType"] == "employer") {
    //if so, set $isLoggedInAsEmployer to true
    $isLoggedInAsEmployer = true;
    //Get employer_id and company name of employer from the session
    $employerId = $_SESSION["id"];
    $employerCompanyName = $_SESSION["name"];
    //Then is variable 'isJobAdOwner' set to true if the logged in employer's company name matches the company name associated with the job ad.
    $isJobAdOwner = ($employerCompanyName === $jobAdDetail->company_name);
}
if ($isJobAdOwner) {
    echo '
    <div class="container">
    <form action="./controllers/JobListingController.php" method="post">
        <input type="hidden" name="type" value="editJobAd">';
?>
<input type="hidden" name="jobListing_id" value=<?php echo $_GET["id"] ?>>
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-sm-8 form-group">
        <h1>Redigere jobbannonse!</h1>
        <?php
        ErrorHandler::displayError();
        $jobAdDetail = $jobListingView->fetchJobAdByJobListingId($_GET["id"]);
        if ($jobAdDetail) {
            echo '
                    <label for="jobTitle">Jobbtittel</label>
                <input type="text" class="form-control" name="jobTitle" placeholder="Jobbtittel" value="' . $jobAdDetail->job_title . '">
            </div>
            <div class="col-sm-8 form-group">
            <label for="positionName">Stillingstittel</label>
            <input type="text" class="form-control" name="positionName" placeholder="Stillingstittel" value="' . $jobAdDetail->position_name . '">
        </div>
        <div class="col-sm-12"></div>
        <div class="col-sm-4 form-group">
            <label for="location">Sted</label>
            <select class="form-select" name="location">';
            $currentLocation = $jobAdDetail->location_name;
            $locations = $jobListingView->fetchAllLocations();
            foreach ($locations as $location) {
                if ($location->location_name == $currentLocation) {
                    echo '<option value="' . $location->location_id . '" selected>' . $location->location_name . '</option>';
                } else {
                    echo '<option value="' . $location->location_id . '">' . htmlspecialchars($location->location_name) . '</option>';
                }
            }
            echo '</select>
            </div> 
            <div class="col-sm-4 form-group">
                    <label for="industry">Bransje</label>
                    <select class="form-select" name="industry">';
            // Set the current industry as the default selected
            $currentIndustryName = $jobAdDetail->industry_name;
            // Fetch all industries
            $industries = $jobListingView->fetchAllIndustries();
            foreach ($industries as $industry) {
                if ($industry->industry_name == $currentIndustryName) {
                    echo '<option value="' . $industry->industry_id . '" selected>' . $industry->industry_name . '</option>';
                } else {
                    echo '<option value="' . $industry->industry_id . '">' . htmlspecialchars($industry->industry_name) . '</option>';
                }
            }
            echo '        
                </select>
            </div>
            <div class="col-sm-12"></div>
                <div class="col-sm-4 form-group">
                    <label for="jobType">Ansettelesform</label>
                    <select class="form-select" name="jobType"';
            $currentJobType = $jobAdDetail->jobType;
            $jobTypes = $jobListingView->fetchAllJobTypes(); // Fetch all jobTypes.
            foreach ($jobTypes as $jobTypeName) {
                if ($jobTypeName->jobType == $currentJobType) {
                    echo '<option value="' . $jobTypeName->jobType_id . '" selected>' .  $jobTypeName->jobType . '</option>';
                } else {
                    echo '<option value="' . $jobTypeName->jobType_id . '">' . htmlspecialchars($jobTypeName->jobType)  . '</option>';
                }
            }
            echo '
                </select>
            </div>
            <div class="col-sm-4 form-group">
            <label for="applicationDeadline">Søknadsfrist</label>';
            echo '<input type="date" class="form-control" name="applicationDeadline" value="' . date('Y-m-d', strtotime($jobAdDetail->application_deadline)) . '">
        </div>
        <div class="col-sm-8 form-group">
        <label for="jobDescription">Jobbbeskrivelse</label>
        <textarea class="form-control" rows="5" name="jobDescription" placeholder="Skriv om jobbstilling her...">' . $jobAdDetail->description . '</textarea>
    </div>
</div>
            ';
        }
        echo '<div class="form-group text-center">
                    <button type="submit" name="cancel" class="btn btn-danger">Avbryt</button>
                    <button type="submit" name="save" class="btn btn-primary">Lagre
                        Endringer</button>
                </div>
    </form>
</div>
    ';
    } else {
        header("Location: index.php");
        exit();
    }
    include "components/footer.php";