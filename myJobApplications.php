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
                <a href="index.php"><?php echo translate("goBack") ?></a>
            </div>
        </div>
    </div>
    <h1><?php echo translate("my_job_applications_header"); ?></h1>

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
                <div class="col-5"> ' . translate("industry") . ': ' . '<b>' . $jobApplication->industry_name . '</b>
                </div>';
            $statusClass = "";
            if (isset($listJobApplication->application_status_name)) {
                if ($listJobApplication->application_status_name === "Avslag") {
                    $statusClass = "statusReject";
                }
            }
            echo '
                <div class="col-2 applicationStatusBadge' . $statusClass . '">
                    ' . $jobApplication->application_status_name . '
                </div>

            </div>
            <div class="row">
                <div class="col-12 mt-2">
                </div>
                <div class="col-5 mt-2"> ' . translate("job_position") . ': ' . '<b>' . $jobApplication->position_name . '</b>
                </div>
                <div class="col-6 mt-2"> ' . translate("form_of_employment") . ': ' . '<b>' . $jobApplication->jobType . '</b>
                </div>
                <div class="col-6 mt-2">
                    Sted: ' . '<b>' . $jobApplication->location_name . '</b>
                </div>
            </div>
            <div class="flex-container mt-2">
                <div>
                    ' . translate("apply_date") . '<b>' . date('d-m-Y', strtotime($jobApplication->apply_date)) . '</b>
                </div>
                <div style="color: red; margin-right: 3rem;">
                ' . translate("applicationDeadline") . ': ' .  '<b>' . date(
                'd-m-Y',
                strtotime($jobApplication->application_deadline)
            ) . '</b>
                </div>
                <div>
                    <a class="btn btn-primary"
                        href="jobApplicationDetail.php?id=' . $jobApplication->jobApplication_id . '" role="button">' . translate("view_job_application_button") . '</a>
                </div>
            </div>
        </div>
    </div>';
        }
    }
    ?>
</div>
<?php include "components/footer.php" ?>