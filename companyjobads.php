<?php
include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "./models/jobListing/JobListingModel.php";
require_once "./controllers/JobListingController.php";
require_once "./views/JobListingView.php";
require_once "./library/errorhandler.php";
require_once "./models/employer/employer.model.php";
require_once "./views/EmployerView.php";

$employerToGet = isset($_GET["id"]) ? $_GET["id"] : 1;
$employerView = new EmployerViewModel($employerToGet);
if (!Validator::isLoggedIn() || !Validator::isEmployer() || !Validator::ownsResource($employerView->getEmployer_id())) {
    header("location: ./index.php");
    exit();
}
?>

<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <?php
                if (Validator::isLoggedIn() && Validator::isEmployer() && Validator::ownsResource($employerView->getEmployer_id())) {
                    echo '<a href="companydashboard.php?id=' . $_SESSION["id"] . '">' . translate("goBackToDashboard_button") . '</a>';
                } else {
                    header("Location: index.php");
                    exit();
                }
                ?>
            </div>
        </div>
        <div>
            <a type="submit" id="createJobAdsButton" class="btn btn-primary" href="postnewjob.php">
                <?php echo translate("createNewJobAd_button"); ?>
            </a>
        </div>
    </div>
    <h1><?php echo translate("companyJobAds_header"); ?></h1>

    <?php
    echo "<br>";
    ErrorHandler::displaySuccess();

    if (isset($_SESSION["id"]) && $_SESSION["userType"] === "employer") {
        $employerId = $_SESSION["id"];
    }
    ErrorHandler::displayError();
    $jobListingView = new JobListingView();
    $jobAdsByEmployer = $jobListingView->fetchAllJobAdsByEmployerId($employerId);
    if ($jobAdsByEmployer === null) {
        echo "Du har ingen jobbannonser.";
    } else {
        foreach ($jobAdsByEmployer as $jobAd) {
            echo '<div class="card cardhover" style="margin-top: 1.2rem;" >
            <div class="card-body">
                <div class="row">                
                    <div class="col-5"> 
                         <b>' . $jobAd->company_name . '</b>
                    </div>
                    <div class="col-5">
                        ' . translate("industry") . ': ' . '<b>' . $jobAd->industry_name . '</b>                       
                    </div>  
                    <div class="col applicationDeadlineDateBadge">
                    ' . translate("applicationDeadline") . ': ' . date('d-m-Y', strtotime($jobAd->application_deadline)) . '
                 </div>                                   
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <b style="font-size: 20px;">' . $jobAd->job_title . '</b>
                    </div>
                    <div class="col-5 mt-2">
                         ' . translate("job_position") . ': ' . '<b>' . $jobAd->position_name . '</b>
                     </div>
                    <div class="col-6 mt-2">
                        ' . translate("form_of_employment") . ': ' . '<b>' . $jobAd->jobType . '</b>
                    </div>
                    <div class="col-6 mt-2">
                        ' . translate("location") . ': ' . '<b>' . $jobAd->location_name . '</b>
                     </div> 
                </div>
                <div class="flex-container mt-2">
                    <div>                          
                        ' . translate("published_date") . ': ' . '<b>' . date('d-m-Y', strtotime($jobAd->published_time)) . '</b>
                     </div>                 
                     <div>
                     <a class="btn btn-primary" href="jobadvertisementdetail.php?id=' . $jobAd->jobListing_id . '" role="button">' . translate("see_details_button") . '</a>
                     </div>
                </div>                   
            </div>
        </div>';
        }
    }
    ?>
</div>
<?php include "components/footer.php" ?>