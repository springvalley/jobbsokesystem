<?php include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "./models/jobListing/JobListingModel.php";
require_once "./controllers/JobListingController.php";
require_once "./views/JobListingView.php";
require_once "./library/errorhandler.php";
?>
<br>
<br>
<div class="container">
    <form action="includes/postnewjob.inc.php" method="post">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-8 form-group">
                <h1>Lag en ny jobbannonse!</h1>
                <?php
                $joblisting = new JobListingView();
                if (isset($_SESSION["id"]) && $_SESSION["userType"] === "employer") {
                    $employerId = $_SESSION["id"];
                }
                ErrorHandler::displayError();
                ErrorHandler::displaySuccess();
                ?>
                <label for="jobtitle">Jobbtittel</label>
                <input type="text" class="form-control" name="jobtitle" placeholder="Jobbtittel">
                <!-- <label for="companyname">Firmanavn</label>
                <input type="text" class="form-control" name="companyname" placeholder="Skriv inn ditt firmanavn"> -->
            </div>

            <div class="col-sm-8 form-group">
                <label for="positionname">Stillingstittel</label>
                <input type="text" class="form-control" name="positionname" placeholder="Stillingstittel">
            </div>
            <div class="col-sm-12"></div>
            <div class="col-sm-4 form-group">
                <label for="location">Sted</label>
                <select class="form-select" name="location" aria-label="Default select example">
                    <option selected value="0">Velg sted</option>
                    <?php
                    $locations = $joblisting->fetchAllLocations(); // Fetch locations
                    foreach ($locations as $location) {
                        echo '<option value="' . $location->location_id . '">' . $location->location_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-4 form-group">
                <label for="industry">Bransje</label>
                <select class="form-select" name="industry" aria-label="Default select example">
                    <option selected value="0">Velg bransje</option>
                    <?php
                    $industries = $joblisting->fetchAllIndustries(); // Fetch industries
                    foreach ($industries as $industry) {
                        echo '<option value="' . $industry->industry_id . '">' . $industry->industry_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-12"></div>
            <div class="col-sm-4 form-group">
                <label for="jobtype">Ansettelesform</label>
                <select class="form-select" name="jobtype" aria-label="Default select example">
                    <option selected value="0">Velg ansettelesform</option>
                    <?php
                    $jobtypes = $joblisting->fetchAllJobTypes(); // Fetch jobtypes
                    foreach ($jobtypes as $jobtype) {
                        echo '<option value="' . $jobtype->jobType_id . '">' . $jobtype->jobType . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-4 form-group">
                <label for="applicationdeadline">Søknadsfrist</label>
                <input type="date" class="form-control" name="applicationdeadline">
            </div>
            <div class="col-sm-8 form-group">
                <label for="jobdescription">Jobbbeskrivelse</label>
                <textarea class="form-control" rows="5" name="jobdescription" name="jobdescription" aria-describedby="jobdescription" placeholder="Skriv om jobbstilling her..."></textarea>
            </div>

        </div>
        <div class="form-group text-center">
            <button type="submit" name="cancel" class="btn btn-danger">Avbryt</button>
            <button type="submit" name="addjob" class="btn btn-primary" href="index.php">Publiser annonse</button>
        </div>
    </form>
</div>

<?php include "components/footer.php"; ?>