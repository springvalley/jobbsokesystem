<?php
include "components/header.php";
require_once "../jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "../jobbsokesystem/views/JobListingView.php";
require_once "../jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";

//Check if 'jobListing_id' is present in the query string of the URL, if not redirect to index page.
if (isset($_GET["id"])) {
    $jobListingId = $_GET["id"];
} else {
    header("Location: ./index.php");
    exit();
}
//Get job ad details.
$jobListingId = $_GET["id"];
$jobListingView = new JobListingView();
$jobAdDetail = $jobListingView->fetchJobAdByJobListingId($jobListingId);

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
    $isJobAdOwner = ($employerCompanyName === $jobAdDetail->company_name);
}
//Check if 'jobAd' is true (successful retrived data), so display the job ad.
if ($jobAdDetail) {
    echo '<div class="container">
        <div class="flex-container">
            <div class="col">
                <div class="goBackLink mb-3">
                    <i class="fa-solid fa-angle-left"></i>
                    <a ' . ($isLoggedInAsEmployer && $isJobAdOwner ? 'href="companyjobads.php"' : 'href="index.php"') . '>Tilbake</a>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-primary" ' . ($isLoggedInAsEmployer ? 'hidden' : '') . '>'. translate("send_message_button") .'</button></div>';

    if ($isJobAdOwner) {
        echo '
        <div>
            <a class="btn editButton" href="editJobAd.php?id=' . $jobAdDetail->jobListing_id . '";><i class="fa-regular fa-pen-to-square"></i>'. translate("edit_jobad_button") .'</a>
        </div>';
        //Show Delete job advertisement button for creator.
        echo '        
            <form action="./controllers/JobListingController.php" method="post" onsubmit="return confirmDeletion();">  
                <input type="hidden" name="type" value="deleteJobAd">  
                <input type="hidden" name="jobListing_id" value="' . $jobAdDetail->jobListing_id . '">                  
                <button class="btn deleteButton" type="submit"> <i class="fa-regular fa-trash-can"></i>'. translate("delete_button") .'</button>           
            </form>';
    }
    echo '    
    </div>';
    ErrorHandler::displaySuccess();
    echo '
    <div class="job-listing-small m-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5"> 
                        <b>' . $jobAdDetail->company_name . '</b>                        
                    </div>
                    <div class="col-5">
                        '. translate("industry") .': ' . '<b>' . $jobAdDetail->industry_name . '</b>                        
                    </div>                                        
                    <div class="col applicationDeadlineDateBadge">
                    '. translate("deadline") .': ' . date('d-m-Y', strtotime($jobAdDetail->application_deadline)) . '
                </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <b style="font-size: 20px;">' . $jobAdDetail->job_title . '</b>
                    </div>
                    <div class="col-5 mt-2">
                        '. translate("job_title") .': ' . '<b>' . $jobAdDetail->position_name . '</b>
                    </div>
                    <div class="col-6 mt-2">
                        '. translate("form_of_employment") .': ' . '<b>' . $jobAdDetail->jobType . '</b>
                    </div>
                    <div class="col-6 mt-2">
                        '. translate("location") .': ' . '<b>' . $jobAdDetail->location_name . '</b>
                    </div>                    
                </div>
                <div class="flex-container mt-2">
                    <div>
                        '. translate("published_date") .': ' . '<b>' . date('d-m-Y', strtotime($jobAdDetail->published_time)) . '</b>
                    </div>                   
                    
                    <div>
                        <a class="btn btn-primary" data-toggle="collapse" href="applyjob.php?id=' . $jobAdDetail->jobListing_id . '" role="button" aria-expanded="false" ' . ($isLoggedInAsEmployer ? 'hidden' : '') . '>'. translate("apply_button") .'</a>
                        <a class="btn btn-primary" data-toggle="collapse" href="listcompanyjobapplications.php?id=' . $jobAdDetail->jobListing_id . '" role="button" aria-expanded="false" ' . ($isJobAdOwner ? '' : 'hidden') . '>Se alle søknader</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="job-content mt-3">
            <h4><b>'. translate("summary").'</b></h4>
            <p>
                ' . $jobAdDetail->description . ' 
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