<?php
include "components/header.php";
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
        <input type="hidden" name="type" value="createANewJobAd">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-8 form-group">
                <h1>Lag en ny jobbannonse!</h1>
                <?php
                $joblisting = new JobListingView();
                if (isset($_SESSION["id"]) && $_SESSION["userType"] === "employer") {
                    $employerId = $_SESSION["id"];
                }
                ErrorHandler::displayError();
                $jobTitle = isset($_SESSION["dataInputForPostNewJob"]["jobTitle"]) ? $_SESSION["dataInputForPostNewJob"]["jobTitle"] : '';
                $positionName = isset($_SESSION["dataInputForPostNewJob"]["positionName"]) ? $_SESSION["dataInputForPostNewJob"]["positionName"] : '';
                ?>
                <label for="jobTitle">Jobbtittel</label>
                <input type="text" class="form-control" name="jobTitle" placeholder="Jobbtittel"
                    value="<?php echo htmlspecialchars($jobTitle); ?>">
            </div>

            <div class="col-sm-8 form-group">
                <label for="positionName">Stillingstittel</label>
                <input type="text" class="form-control" name="positionName" placeholder="Stillingstittel"
                    value="<?php echo htmlspecialchars($positionName); ?>">
            </div>
            <div class="col-sm-12"></div>
            <div class="col-sm-4 form-group">
                <label for="location">Sted</label>
                <select class="form-select" name="location">
                    <option value="0" selected
                        <?php echo (!isset($_SESSION['dataInputForPostNewJob']['location']) || $_SESSION['dataInputForPostNewJob']['location'] == 0) ? 'selected' : ''; ?>>
                        Velg sted</option>
                    <?php
                    $locations = $joblisting->fetchAllLocations(); // Get all locations for select list
                    foreach ($locations as $location) {
                        $selectedLocation = (isset($_SESSION['dataInputForPostNewJob']['location']) && $_SESSION['dataInputForPostNewJob']['location'] == $location->location_id) ? 'selected' : '';
                        echo '<option value="' . $location->location_id . '" ' . $selectedLocation . '>' .  $location->location_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-4 form-group">
                <label for="industry">Bransje</label>
                <select class="form-select" name="industry">
                    <option value="0" selected
                        <?php echo (!isset($_SESSION['dataInputForPostNewJob']['industry']) || $_SESSION['dataInputForPostNewJob']['industry'] == 0) ? 'selected' : ''; ?>>
                        Velg bransje</option>
                    <?php
                    $industries = $joblisting->fetchAllIndustries(); // Get all industries for select list
                    foreach ($industries as $industry) {
                        $selectedIndustry = (isset($_SESSION['dataInputForPostNewJob']['industry']) && $_SESSION['dataInputForPostNewJob']['industry'] == $industry->industry_id) ? 'selected' : '';
                        echo '<option value="' . $industry->industry_id . '" ' . $selectedIndustry . '>' . $industry->industry_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-12"></div>
            <div class="col-sm-4 form-group">
                <label for="jobType">Ansettelesform</label>
                <select class="form-select" name="jobType">
                    <option value="0" selected
                        <?php echo (!isset($_SESSION['dataInputForPostNewJob']['jobType']) || $_SESSION['dataInputForPostNewJob']['jobType'] == 0) ? 'selected' : ''; ?>>
                        Velg ansettelesform</option>
                    <?php
                    $jobtypes = $joblisting->fetchAllJobTypes(); // Get all jobtypes for select list
                    foreach ($jobtypes as $jobtype) {
                        $selectedJobType = (isset($_SESSION['dataInputForPostNewJob']['jobType']) && $_SESSION['dataInputForPostNewJob']['jobType'] == $jobtype->jobType_id) ? 'selected' : '';
                        echo '<option value="' . $jobtype->jobType_id . '" ' . $selectedJobType . '>' . $jobtype->jobType . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-4 form-group">
                <label for="applicationDeadline">Søknadsfrist</label>
                <?php $applicationDeadlineDate = isset($_SESSION["dataInputForPostNewJob"]["applicationDeadline"]) ? $_SESSION["dataInputForPostNewJob"]["applicationDeadline"] : ""; ?>
                <input type="date" class="form-control" name="applicationDeadline"
                    value="<?php echo $applicationDeadlineDate; ?>">
            </div>
            <div class="col-sm-8 form-group">
                <?php $jobDescription = isset($_SESSION["dataInputForPostNewJob"]["jobDescription"]) ? $_SESSION["dataInputForPostNewJob"]["jobDescription"] : ""; ?>
                <label for="jobDescription">Jobbbeskrivelse</label>
                <textarea class="form-control" rows="10" name="jobDescription"
                    placeholder="Skriv om jobbstilling her..."><?php
                                                                                                                            echo htmlspecialchars($jobDescription); ?></textarea>
            </div>

        </div>
        <div class="form-group text-center">
            <a href="companyjobads.php" class="btn btn-danger">Avbryt</a>
            <button type="submit" name="addJob" class="btn btn-primary">Publiser annonse</button>
        </div>
    </form>
</div>
<?php include "components/footer.php"; ?>