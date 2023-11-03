<?php 
include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "./models/jobListing/JobListingModel.php";
require_once "./controllers/JobListingController.php";
require_once "./views/JobListingView.php";

// session_start();
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
        <a type="submit" id="createJobAdsButton" class="btn btn-primary" href="postnewjob.php">Lag ny jobbannonse</a>           
        </div>
    </div>
    <h1>Alle Jobbannonser</h1>
   
    <?php    
    // if(isset($_SESSION["employer_id"])) {}
    // $employerId = 2;
    // $employerId = $_SESSION["employer_id"];    
    // var_dump($_SESSION["employer_id"]); // Debugging output
    $employerId = 2;
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
                    <div class="col-6">
                         Bransje: ' . '<b>'. $jobAd->industry_name . '</b>                       
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <b style="font-size: 20px;">' . $jobAd->job_title . '</b>
                    </div>
                    <div class="col-5 mt-2">
                         Stillingtittel: ' . '<b>'. $jobAd->position_name . '</b>
                     </div>
                    <div class="col-6 mt-2">
                         Ansettelsesform: ' . '<b>' . $jobAd->jobType . '</b>
                    </div>
                    <div class="col-6 mt-2">
                         Sted: ' . '<b>'. $jobAd->location_name . '</b>
                     </div>
                </div>
                <div class="flex-container mt-2">
                    <div>                          
                         Publiseringsdato: '. '<b>' . date('d-m-Y', strtotime($jobAd->published_time)) . '</b>
                     </div>
                    <div style="color: red; padding-right: 14rem;">
                         Søknadsfrist: ' . '<b>' . date('d-m-Y', strtotime($jobAd->application_deadline)) . '</b>
                     </div>
                    <div>                        
                    </div>


                </div>   
                
            </div>
        </div>';
        }
    }
    
    
    ?>
   
</div>
<?php include "components/footer.php" ?>