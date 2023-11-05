<?php
include "components/header.php";
require_once "../jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "../jobbsokesystem/views/JobListingView.php";

if (isset($_GET["jobListing_id"])) {
    $jobListingId = $_GET["jobListing_id"];
} else {
    header("Location: index.php");
}
$jobListingView = new JobListingView();
$jobAd = $jobListingView->fetchJobAdByJobListingId($jobListingId);
if ($jobAd) {
    echo '<div class="container">
        <div class="flex-container">
            <div>
                <div class="goBackLink mb-3">
                    <i class="fa-solid fa-angle-left"></i>
                    <a href="index.php">Tilbake</a>
                </div>
            </div>
            <div>
                <button type="button" class="editProfileButton">Send melding</button>
            </div>
        </div>
        <div class="job-listing-small">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5"> 
                            <b>' . $jobAd->company_name . '</b>                        
                        </div>
                        <div class="col-6">
                        Bransje: ' . '<b>' . $jobAd->industry_name . '</b>                        
                        </div>
                        <div class="col">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <b style="font-size: 20px;">' . $jobAd->job_title . '</b>
                        </div>
                        <div class="col-5 mt-2">
                            Stillingtittel: ' . '<b>' . $jobAd->position_name . '</b>
                        </div>
                        <div class="col-6 mt-2">
                            Ansettelsesform: ' . '<b>' . $jobAd->jobType . '</b>
                        </div>
                        <div class="col-6 mt-2">
                            Sted: ' . '<b>' . $jobAd->location_name . '</b>
                        </div>
    
                    </div>
                    <div class="flex-container mt-2">
                        <div>
                            Publiseringsdato: ' . '<b>' . date('d-m-Y', strtotime($jobAd->published_time)) . '</b>
                        </div>
                        <div style="color: red;  padding-right: 7rem;">
                            Søknadsfrist: ' . '<b>' . date('d-m-Y', strtotime($jobAd->application_deadline)) . '</b>
                        </div>
                        <div>
                            <a class="btn btn-primary" data-toggle="collapse" href="applyjob.php" role="button" aria-expanded="false">Søk Stilling</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="job-content mt-3">
                <h4><b>Om jobben</b></h4>
                <p>
                    ' . $jobAd->description . ' 
                </p>
    
            </div>
        </div>
    </div>';
} //else {
//     echo "Cannot find";
// }
// }

?>



<?php include "components/footer.php" ?>