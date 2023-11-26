<?php include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/models/JobApplicationModel.php";
require_once "/xampp/htdocs/jobbsokesystem/views/JobApplicationView.php";
require_once "/xampp/htdocs/jobbsokesystem/views/JobListingView.php";
require_once "/xampp/htdocs/jobbsokesystem/library/validator.php";


?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="companyjobads.php">Tilbake</a>
            </div>
        </div>
    </div>
    <h1>Jobbsøknader</h1>

    <?php
    echo "<br>";

    // if (isset($_SESSION["id"]) && $_SESSION["userType"] === "employer") {
    //     $employerId = $_SESSION["id"];
    // }
    // Validator::isLoggedInAsEmployer();
    $jobApplicationView = new JobApplicationView();
    $jobListingId = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : null;

    $jobListingView = new JobListingView();

    $jobAdDetail = $jobListingView->fetchJobAdByJobListingId($jobListingId);

    if (!Validator::isJobAdOwner($jobAdDetail->company_name)) {
        header("Location: index.php");
        exit();
    }

    $listJobApplications = $jobApplicationView->fetchListJobApplicationsForEmployer($jobListingId);

    if (!$listJobApplications) {
        echo "Du har ingen jobbsøknad.";
    } else {
        foreach ($listJobApplications as $listJobApplication) {
            echo '<div class="card listJobApplicationCard">
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    Kandidatnr: <b>' . $listJobApplication->jobApplicant_id . '</b>
                </div>
                <div class="col-5">
                    Kandidatsnavn: ' . '<b>' . $listJobApplication->name . '</b>                 
                </div>               
                <div class="col applicationStatusBadge">
                ' . $listJobApplication->application_status_name . ' 
            </div>               
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                </div>
                <div class="col-5 mt-2">
                    Stillingtittel: ' . '<b>' . $listJobApplication->position_name . '</b>
                </div>
                <div class="col-6 mt-2">
                    Ansettelsesform: ' . '<b>' . $listJobApplication->jobType . '</b>
                </div>
                <div class="col-6 mt-2">
                    Sted: ' . '<b>' . $listJobApplication->location_name . '</b>
                </div>
            </div>
            <div class="flex-container mt-2">
                <div>
                    Søknadsdato: ' . '<b>' . date('d-m-Y', strtotime($listJobApplication->apply_date)) . '</b>
                </div>
                <div style="color: red; margin-right: 1rem;">
                    Søknadsfrist for stilling: ' . '<b>' . date(
                'd-m-Y',
                strtotime($listJobApplication->application_deadline)
            ) . '</b>
                </div>
                <div>
                    <a class="btn btn-primary"
                        href="jobApplicationDetail.php?id=' . $listJobApplication->jobApplication_id . '" role="button">Se
                        Søknad</a>
                </div>
            </div>
        </div>
    </div>';
        }
    }
    ?>
</div>
<?php include "components/footer.php" ?>