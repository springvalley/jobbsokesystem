<?php
include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/models/JobApplicationModel.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/views/JobApplicationView.php";
?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="index.php">Tilbake</a>
            </div>
        </div>
    </div>
    <h1>Mine jobbsøknader</h1>

    <?php
    echo "<br>";
    ErrorHandler::displaySuccess();

    if (isset($_SESSION["id"]) && $_SESSION["userType"] === "jobapplicant") {
        $jobApplicantId = $_SESSION["id"];
    }
    ErrorHandler::displayError();
    $jobApplicationView = new JobApplicationView();
    $jobApplications = $jobApplicationView->fetchAllJobApplicationsForJobSeeker($jobApplicantId);
    if ($jobApplications === null) {
        echo "Du har ingen jobbsøknad.";
    } else {
        foreach ($jobApplications as $jobApplication) {
            echo '<div class="card cardhover" style="margin-top: 1.2rem;">
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    <b>' . $jobApplication->company_name . '</b>
                </div>
                <div class="col-5">
                    Bransje: ' . '<b>' . $jobApplication->industry_name . '</b>
                </div>
                <div class="col-2 applicationStatusBadge">
                    ' . $jobApplication->application_status_name . '
                </div>

            </div>
            <div class="row">
                <div class="col-12 mt-2">
                </div>
                <div class="col-5 mt-2">
                    Stillingtittel: ' . '<b>' . $jobApplication->position_name . '</b>
                </div>
                <div class="col-6 mt-2">
                    Ansettelsesform: ' . '<b>' . $jobApplication->jobType . '</b>
                </div>
                <div class="col-6 mt-2">
                    Sted: ' . '<b>' . $jobApplication->location_name . '</b>
                </div>
            </div>
            <div class="flex-container mt-2">
                <div>
                    Søknadsdato: ' . '<b>' . date('d-m-Y', strtotime($jobApplication->apply_date)) . '</b>
                </div>
                <div style="color: red; margin-right: 1rem;">
                    Søknadsfrist for stilling: ' . '<b>' . date(
                'd-m-Y',
                strtotime($jobApplication->application_deadline)
            ) . '</b>
                </div>
                <div>
                    <a class="btn btn-primary"
                        href="jobApplicationDetail.php?id=' . $jobApplication->jobApplication_id . '" role="button">Se
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