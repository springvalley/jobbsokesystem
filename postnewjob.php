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
                // ErrorHandler::displaySuccess();               
                $jobTitle = isset($_SESSION["inputDataForPostNewJob"]["jobTitle"]) ? $_SESSION["inputDataForPostNewJob"]["jobTitle"] : '';
                $positionName = isset($_SESSION["inputDataForPostNewJob"]["positionName"]) ? $_SESSION["inputDataForPostNewJob"]["positionName"] : '';
                ?>
                <label for="jobTitle">Jobbtittel</label>
                <input type="text" class="form-control" name="jobTitle" placeholder="Jobbtittel" value="<?php echo htmlspecialchars($jobTitle); ?>">
            </div>

            <div class="col-sm-8 form-group">
                <label for="positionName">Stillingstittel</label>
                <input type="text" class="form-control" name="positionName" placeholder="Stillingstittel" value="<?php echo htmlspecialchars($positionName); ?>">
            </div>
            <div class="col-sm-12"></div>
            <div class="col-sm-4 form-group">
                <label for="location">Sted</label>
                <select class="form-select" name="location" aria-label="Default select example">
                    <option value="0" selected <?php echo (!isset($_SESSION['inputDataForPostNewJob']['location']) || $_SESSION['inputDataForPostNewJob']['location'] == 0) ? 'selected' : ''; ?>>
                        Velg sted</option>
                    <?php
                    $locations = $joblisting->fetchAllLocations(); // Get all locations for select list
                    foreach ($locations as $location) {
                        $selectedLocation = (isset($_SESSION['inputDataForPostNewJob']['location']) && $_SESSION['inputDataForPostNewJob']['location'] == $location->location_id) ? 'selected' : '';
                        echo '<option value="' . $location->location_id . '" ' . $selectedLocation . '>' .  $location->location_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-4 form-group">
                <label for="industry">Bransje</label>
                <select class="form-select" name="industry" aria-label="Default select example">
                    <option value="0" selected <?php echo (!isset($_SESSION['inputDataForPostNewJob']['industry']) || $_SESSION['inputDataForPostNewJob']['industry'] == 0) ? 'selected' : ''; ?>>
                        Velg bransje</option>
                    <?php
                    $industries = $joblisting->fetchAllIndustries(); // Get all industries for select list
                    foreach ($industries as $industry) {
                        $selectedIndustry = (isset($_SESSION['inputDataForPostNewJob']['industry']) && $_SESSION['inputDataForPostNewJob']['industry'] == $industry->industry_id) ? 'selected' : '';
                        echo '<option value="' . $industry->industry_id . '" ' . $selectedIndustry . '>' . $industry->industry_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-12"></div>
            <div class="col-sm-4 form-group">
                <label for="jobType">Ansettelesform</label>
                <select class="form-select" name="jobType" aria-label="Default select example">
                    <option value="0" selected <?php echo (!isset($_SESSION['inputDataForPostNewJob']['jobType']) || $_SESSION['inputDataForPostNewJob']['jobType'] == 0) ? 'selected' : ''; ?>>
                        Velg ansettelesform</option>
                    <?php
                    $jobtypes = $joblisting->fetchAllJobTypes(); // Get all jobtypes for select list
                    foreach ($jobtypes as $jobtype) {
                        $selectedJobType = (isset($_SESSION['inputDataForPostNewJob']['jobType']) && $_SESSION['inputDataForPostNewJob']['jobType'] == $jobtype->jobType_id) ? 'selected' : '';
                        echo '<option value="' . $jobtype->jobType_id . '" ' . $selectedJobType . '>' . $jobtype->jobType . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-4 form-group">
                <label for="applicationDeadline">Søknadsfrist</label>
                <?php $applicationDeadlineDate = isset($_SESSION["inputDataForPostNewJob"]["applicationDeadline"]) ? $_SESSION["inputDataForPostNewJob"]["applicationDeadline"] : ""; ?>
                <input type="date" class="form-control" name="applicationDeadline" value="<?php echo $applicationDeadlineDate; ?>">
            </div>
            <div class="col-sm-8 form-group">
                <?php $jobDescription = isset($_SESSION["inputDataForPostNewJob"]["jobDescription"]) ? $_SESSION["inputDataForPostNewJob"]["jobDescription"] : ""; ?>
                <label for="jobDescription">Jobbbeskrivelse</label>
                <textarea class="form-control" rows="5" name="jobDescription" aria-describedby="jobDescription" placeholder="Skriv om jobbstilling her..."><?php
                                                                                                                                                            echo htmlspecialchars($jobDescription); ?></textarea>
            </div>

        </div>
        <div class="form-group text-center">
            <button type="submit" name="cancel" class="btn btn-danger">Avbryt</button>
            <button type="submit" name="addjob" class="btn btn-primary">Publiser annonse</button>
        </div>
    </form>
</div>
<?php include "components/footer.php"; ?>