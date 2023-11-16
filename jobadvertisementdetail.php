<?php
include "components/header.php";
require_once "../jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "../jobbsokesystem/views/JobListingView.php";
require_once "../jobbsokesystem/library/errorhandler.php";

//Check if 'jobListing_id' is present in the query string of the URL, if not redirect to index page.
if (isset($_GET["jobListing_id"])) {
    $jobListingId = $_GET["jobListing_id"];
} else {
    header("Location: ./index.php");
    exit();
}
//Get job ad details.
$jobListingId = $_GET["jobListing_id"];
$jobListingView = new JobListingView();
$jobAd = $jobListingView->fetchJobAdByJobListingId($jobListingId);

//initialized variable 'isLoggedInAsEmployer' to check if the current user is logged in as an employer.
$isLoggedInAsEmployer = false;
//initialized variable 'isJobAdOwner' to check if the logged in-employer is an owner of the job ad.
$isJobAdOwner = false;

// Check if the user is logged in ($_SESSION["id] is set) and if the user has logged in as employer
if (isset($_SESSION["id"]) && $_SESSION["userType"] == "employer") {
    //if so, set $isLoggedInAsEmployer to true
    $isLoggedInAsEmployer = true;
    //Get employer_id and company name of employer from the session
    $employerId = $_SESSION["id"];
    $employerCompanyName = $_SESSION["name"];
    //Then is variable 'isJobAdOwner' set to true if the logged in employer's company name matches the company name associated with the job ad.
    $isJobAdOwner = ($employerCompanyName === $jobAd->company_name);
}
//Check if 'jobAd' is true (successful retrived data), so display the job ad.
if ($jobAd) {
    echo '<div class="container">
        <div class="flex-container">
            <div class="col">
                <div class="goBackLink mb-3">
                    <i class="fa-solid fa-angle-left"></i>
                    <a ' . ($isLoggedInAsEmployer && $isJobAdOwner ? 'href="companyjobads.php"' : 'href="index.php"') . '>Tilbake</a>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-primary" ' . ($isLoggedInAsEmployer ? 'hidden' : '') . '>Send melding</button></div>';

    if ($isJobAdOwner) {
        echo '
        <div>
            <a class="btn btn-primary" href="editJobAd.php?jobListing_id=' . $jobAd->jobListing_id . '" style="margin-right:10px";>Redigere jobbannonse</a>
        </div>';
        //Delete job advertisement
        echo '        
            <form action="./controllers/JobListingController.php" method="post" onsubmit="return confirmDeletion();">                  
                <input type="hidden" name="type" value="deleteJobAd">  
                <input type="hidden" name="jobListing_id" value="' . $jobAd->jobListing_id . '">                  
                <button type="submit" class="btn btn-danger"> <i class="fa-regular fa-trash-can"></i> Slett</button>
            </form>';
    }
    echo '    
    </div>';
    ErrorHandler::displaySuccess();
    echo '
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

                </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <b style="font-size: 20px;">' . $jobAd->job_title . '</b>
                    </div>
                    <div class="col-5 mt-2">
                        Stillingstittel: ' . '<b>' . $jobAd->position_name . '</b>
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
                    <div style="color: red;  padding-right: 14rem;">
                        Søknadsfrist: ' . '<b>' . date('d-m-Y', strtotime($jobAd->application_deadline)) . '</b>
                    </div>
                    <div>
                        <a class="btn btn-primary" data-toggle="collapse" href="applyjob.php?id=' . $jobAd->jobListing_id . '" role="button" aria-expanded="false" ' . ($isLoggedInAsEmployer ? 'hidden' : '') . '>Søk Stilling</a>
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
}
?>
<?php include "components/footer.php" ?>

<script>
function confirmDeletion() {
    return confirm("Er du sikker på at du vil slette denne jobbannonsen?");
}
</script>