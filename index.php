<?php
include "components/header.php";
include_once "models\jobListing/tempJobListing.model.php";
include_once "models\jobListing\jobListing.viewModel.php";
require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";

$helperModel = new Helper();
?>


<div class="container">
    <a href="applicantprofile.php?id=10">TEST</a>
    <h1>Finn din nye jobb</h1>
    <div class="row mt-3">
        <div class="col">
            <input type="text" class="form-control" id="searchText" aria-describedby="searchText" placeholder="Søk i fritekst (eks: 1,2,3)">
        </div>
        <div class="col">
            <select class="form-select" name="location">
                <?php
                $data = $helperModel->getAllJobTypes();
                foreach ($data as $jobtype) {
                    echo '<option value="' . $jobtype->jobType_id . '">' . $jobtype->jobType . '</option>';
                } ?>
            </select>
        </div>
        <div class="col">
        <select class="form-select" name="location">
                <?php
                $data = $helperModel->getAllIndustries();
                foreach ($data as $industry) {
                    echo '<option value="' . $industry->industry_id . '">' . $industry->industry_name . '</option>';
                } ?>
            </select>
        </div>
        <div class="col">
            <select class="form-select" name="location">
                <option selected value="velg sted">Velg Sted</option>
                <?php
                $data = $helperModel->getAllLocations();
                foreach ($data as $location) {
                    echo '<option value="' . $location->location_id . '">' . $location->location_name . '</option>';
                } ?>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="search-button">Søk</button>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-9">
                <p>Alle ledige stillinger(20000)</p>
            </div>
            <div class="col-3">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Filtrer</option>
                    <option value="1">Kristiansand</option>
                    <option value="2">Oslo</option>
                    <option value="3">Trondheim</option>
                </select>
            </div>
        </div>
        <?php
        $model = new JobListingModel();
        $amountOfJobs = $model->getNumberOfJobListingsInDB();
        for ($i = 1; $i <= $amountOfJobs; $i++) {
            $jobListingView = new JobListingViewModel($i);
            require "components/joblist.php";
            echo "<br>";
        }
        ?>
    </div>
    <?php include "components/footer.php" ?>
</div>