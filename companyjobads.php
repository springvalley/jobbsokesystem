<?php
require_once "/xampp/htdocs/jobbsokesystem/components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "./models/jobListing/JobListingModel.php";
require_once "./controllers/JobListingController.php";
require_once "./views/JobListingView.php";

?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="companydashboard.php">Tilbake Dashboard</a>
            </div>
        </div>
        <div>
            <a type="submit" id="createJobAdsButton" class="btn btn-primary" href="postnewjob.php">Lag ny
                jobbannonse</a>
        </div>
    </div>
    <h1>Alle Jobbannonser</h1>
    <div class="jobListing">
        <?php

        $jobListingView = new JobListingView();
        $jobAdsByEmployer = $jobListingView->fetchAllJobAdsByEmployer($employerId);
        if (!empty($jobAdsByEmployer)) {
            foreach ($jobAdsByEmployer as $jobAdByEmployer) {
                echo '<div class="card cardhover" style=" margin: 0px 100px 10px 100px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">' . '<b>' . $jobAdByEmployer->company_name . '</b> </div>
                    <div class="col-6">Bransje: ' . '<b>' . $jobAdByEmployer->industry_name . '</b> </div>
                    <div class="col">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-1">
                        <b style="font-size: 20px;">' . $jobAdByEmployer->job_title . '</b>
                    </div>
                    <div class="col-6 mt-1">Stillingtittel: ' . '<b>' . $jobAdByEmployer->position_name . '</b> </div>
                    <div class="col-6 mt-1">Ansettelsesform: ' . '<b>' . $jobAdByEmployer->jobType . '</b> </div>
                    <div class="col-6 mt-1">Sted: ' . '<b>' . $jobAdByEmployer->location_name . '</b> </div>
                </div>
                <div class="flex-container mt-1">
                    <div>Publiseringdato: ' . '<b>' . $jobAdByEmployer->published_time . '</b> </div>
                    <div style="color: red;">Søknadsfrist: ' . '<b>' . $jobAdByEmployer->application_deadline . '</b> </div>
                    <div>
                        <a class="btn btn-primary" data-toggle="collapse" href="#joblist" role="button" aria-expanded="false">Se
                            detaljer...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="overflow-auto collapse" id="joblist" style="height: 200px">
                <p class="card-text">Lorem ipsum osv</p>
                <button class="btn btn-primary">Søk Jobb</button>
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
</div>
<?php include "components/footer.php" ?>