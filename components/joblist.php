<?php
// include_once "models\jobListing/tempJobListing.model.php";
// include_once "models\jobListing\jobListing.viewModel.php";
include "/xampp/htdocs/jobbsokesystem/components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "/xampp/htdocs/jobbsokesystem/controllers/JobListingController.php";
require_once "/xampp/htdocs/jobbsokesystem/views/JobListingView.php";
?>

<div class="job-listing-small">
    <?php
    $jobListingView = new JobListingView();
    $jobAds = $jobListingView->fetchAllJobAds();
    if (!empty($jobAds)) {
        foreach ($jobAds as $jobAd) {
            echo '<div class="card cardhover" style=" margin: 0px 100px 10px 100px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">' . $jobAd->company_name . '</div>
                    <div class="col-6">Bransje: ' . $jobAd->industry_name . '</div>
                    <div class="col">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-1">
                        <b style="font-size: 20px;">' . $jobAd->job_title . '</b>
                    </div>
                    <div class="col-6 mt-1">Stillingtittel: ' . $jobAd->position_name . '</div>
                    <div class="col-6 mt-1">Ansettelsesform: ' . $jobAd->jobType . '</div>
                    <div class="col-6 mt-1">Sted: ' . $jobAd->location_name . '</div>
                </div>
                <div class="flex-container mt-1">
                    <div>Publiseringdato: ' . $jobAd->published_time . '</div>
                    <div style="color: red;">Søknadsfrist: ' . $jobAd->published_time . '</div>
                    <div>
                        <a class="btn btn-info" data-toggle="collapse" href="#joblist" role="button" aria-expanded="false">Se
                            detaljer...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="overflow-auto collapse" id="joblist" style="height: 200px">
                <p class="card-text">Lorem ipsum osv</p>
                <button class="btn btn-info">Søk Jobb</button>
            </div>
        </div>';
        }
    }
    ?>
    <div class="row">
        <div class="overflow-auto collapse" id="joblist" style="height: 200px">
            <p class="card-text">Lorem ipsum osv</p>
            <button class="btn btn-primary">Søk Jobb</button>
        </div>
    </div>
</div>