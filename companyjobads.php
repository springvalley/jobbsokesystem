<?php
include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "./models/jobListing/JobListingModel.php";
require_once "./controllers/JobListingController.php";
require_once "./views/JobListingView.php";
// require_once "./library/errorhandler.php";
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
            <a type="submit" id="createJobAdsButton" class="btn btn-primary" href="postnewjob.php"> + Legg til en ny
                jobbannonse</a>
        </div>
    </div>
    <h1>Mine jobbannonser</h1>

    <?php
    echo "<br>";
    // ErrorHandler::displaySuccess();

    if (isset($_SESSION["id"]) && $_SESSION["userType"] === "employer") {
        $employerId = $_SESSION["id"];
    } else {
        echo "Du har ingen jobbannonse.";
    }
    $jobListingView = new JobListingView();
    $jobAdsByEmployer = $jobListingView->fetchAllJobAdsByEmployerId($employerId);

    if (!empty($jobAdsByEmployer)) {
        foreach ($jobAdsByEmployer as $jobAd) {
            echo '<div class="card cardhover" style="margin-top: 1.2rem;" >
            <div class="card-body">
                <div class="row">
                
                    <div class="col-5"> 
                         <b>' . $jobAd->company_name . '</b>
                    </div>
                    <div class="col-5">
                         Bransje: ' . '<b>' . $jobAd->industry_name . '</b>                       
                    </div>     
                    <div class="col">                    
                    <a href="editJobAd.php?jobListing_id=' . $jobAd->jobListing_id . '" style="margin-left: 5rem;"> <i class="fa-regular fa-pen-to-square"> </i> Redigere</a>
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
                    <div style="color: red; padding-right: 5rem;">
                         Søknadsfrist: ' . '<b>' . date('d-m-Y', strtotime($jobAd->application_deadline)) . '</b>
                     </div>
                     <div>
                     <a class="btn btn-primary" href="jobadvertisementdetail.php?jobListing_id=' . $jobAd->jobListing_id . '" role="button">Se jobbannonse</a>
                     </div>


                </div>   
                
            </div>
        </div>';
        }
    }
    ?>
</div>
<?php include "components/footer.php" ?>