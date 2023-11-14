<?php
include "components/header.php";
// require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "./models/jobListing/JobListingModel.php";
require_once "./controllers/JobListingController.php";
require_once "./views/JobListingView.php";
require_once "./library/errorhandler.php";
?>
<br>
<br>
<div class="container">
    <form action="./controllers/JobListingController.php" method="post">
        <input type="hidden" name="type" value="editJobAd">
        <?php

        $jobListingView = new JobListingView();

        if (isset($_GET["jobListing_id"])) {
            $jobListing = $_GET["jobListing_id"];
        } else {
            $jobAdDetail = $jobListingView->fetchJobAdByJobListingId($jobListing_id);
            header("Location: ../jobadvertisementdetail.php?jobListing_id=" . $jobAdDetail->jobListing_id . "");
            exit();
        }
        ?>
        <input type="hidden" name="jobListing_id" value=<?php echo $_GET["jobListing_id"] ?>>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-8 form-group">
                <h1>Redigere jobbannonse!</h1>
                <?php
                // if (isset($_SESSION["id"]) && $_SESSION["userType"] === "employer") {
                //     $employerId = $_SESSION["id"];
                // }
                ErrorHandler::displayError();
                $jobAdDetail = $jobListingView->fetchJobAdByJobListingId($_GET["jobListing_id"]);
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
                    $currentLocationId = $jobAdDetail->location_id; // Store the current location ID
                    $locations = $jobListingView->fetchAllLocations(); // Fetch locations                 
                    echo '<option value="' . $currentLocationId . '" selected>' . $currentLocation = $jobAdDetail->location_name . '</option>';
                    foreach ($locations as $location) {
                        if ($location->location_id != $currentLocationId) {
                            echo '<option value="' . $location->location_id . '">' . htmlspecialchars($location->location_name) . '</option>';
                        }
                    }

                    echo '</select>
            </div> 
            <div class="col-sm-4 form-group">
                    <label for="industry">Bransje</label>
                    <select class="form-select" name="industry">';
                    $currentIndustryId = $jobAdDetail->industry_id;
                    $currentIndustryName = $jobAdDetail->industry_name;
                    // Set the current industry as the default selected
                    echo '<option value="' . htmlspecialchars($currentIndustryId) . '" selected>' . htmlspecialchars($currentIndustryName) . '</option>';

                    // Fetch all industries
                    $industries = $jobListingView->fetchAllIndustries();
                    foreach ($industries as $industry) {
                        if ($industry->industry_id != $currentIndustryId) {
                            // List other industries as options
                            echo '<option value="' . htmlspecialchars($industry->industry_id) . '">' . htmlspecialchars($industry->industry_name) . '</option>';
                        }
                    }
                    echo '        
                </select>
            </div>
            <div class="col-sm-12"></div>
                <div class="col-sm-4 form-group">
                    <label for="jobType">Ansettelesform</label>
                    <select class="form-select" name="jobType" aria-label="Default select example">';
                    $currentJobTypeId = $jobAdDetail->jobType_id;
                    echo '<option value="' . $currentJobTypeId . '" selected>' . $currentJobType = $jobAdDetail->jobType . '</option>';
                    $jobTypes = $jobListingView->fetchAllJobTypes(); // Fetch jobtypes
                    foreach ($jobTypes as $jobType) {
                        if ($jobType !== $currentJobTypeId) {
                            echo '<option value="' . $jobType->jobType_id . '">' . $jobType->jobType . '</option>';
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
                ?>


                <div class="form-group text-center">
                    <button type="submit" name="cancel" class="btn btn-danger">Avbryt</button>
                    <button type="submit" name="save" class="btn btn-primary">Lagre
                        Endringer</button>
                </div>
    </form>
</div>
<?php include "components/footer.php"; ?>