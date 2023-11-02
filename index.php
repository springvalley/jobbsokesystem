<?php
include "/xampp/htdocs/jobbsokesystem/components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "/xampp/htdocs/jobbsokesystem/controllers/JobListingController.php";
require_once "/xampp/htdocs/jobbsokesystem/views/JobListingView.php";
?>

<div class="container">
    <a href="applicantprofile.php?id=10">TEST</a>
    <h1>Finn din nye jobb</h1>
    <div class="row mt-3">
        <div class="col">
            <input type="text" class="form-control" id="searchText" aria-describedby="searchText" placeholder="Søk i fritekst (eks: 1,2,3)">
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
                    <option selected>Filtrer sted</option>
                    <?php
                    $jobListingView = new JobListingView();
                    $locations = $jobListingView->fetchAllLocations();
                    foreach ($locations as $location) {
                        echo '<option value="' . $location->location_id . '">' . $location->location_name . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="jobListing">
    <?php
    $jobAds = $jobListingView->fetchAllJobAds();
    if (!empty($jobAds)) {
        foreach ($jobAds as $jobAd) {
            echo '<div class="card cardhover">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">' . '<b>' . $jobAd->company_name . '</b> </div>
                    <div class="col-6">Bransje: ' . '<b>' . $jobAd->industry_name . '</b> </div>
                    <div class="col">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-1">
                        <b style="font-size: 20px;">' . $jobAd->job_title . '</b>
                    </div>
                    <div class="col-6 mt-1">Stillingtittel: ' . '<b>' . $jobAd->position_name . '</b> </div>
                    <div class="col-6 mt-1">Ansettelsesform: ' . '<b>' . $jobAd->jobType . '</b> </div>
                    <div class="col-6 mt-1">Sted: ' . '<b>' . $jobAd->location_name . '</b> </div>
                </div>
                <div class="flex-container mt-1">
                    <div>Publiseringdato: ' . '<b>' . $jobAd->published_time . '</b> </div>
                    <div style="color: red;">Søknadsfrist: ' . '<b>' . $jobAd->application_deadline . '</b> </div>
                    <div>
                        <a class="btn btn-primary" data-toggle="collapse" href="#joblist" role="button" aria-expanded="false">Se
                            detaljer...</a>
                    </div>
                </div>
            </div>
        </div>';
        }
    }
    ?>
    <!-- <div class="row">
        <div class="overflow-auto collapse" id="joblist" style="height: 200px">
            <p class="card-text">Lorem ipsum osv</p>
            <button class="btn btn-primary">Søk Jobb</button>
        </div>
    </div> -->
</div>
<?php include "components/footer.php" ?>