<?php
include "components/header.php";
require_once "../jobbsokesystem/models/JobApplicationModel.php";
require_once "../jobbsokesystem/views/JobApplicationView.php";
require_once "../jobbsokesystem/views/JobApplicationView.php";
require_once "../jobbsokesystem/library/validator.php";
$jobApplicationView = new JobApplicationView();

//Check if the server received a post request and the 'jobApplicationId' is set in the POST data. 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jobApplicationId"])) {
    $jobApplicationId = htmlspecialchars($_POST["jobApplicationId"]);

    //Check if an "action" parameter is provided in the POST request
    if (isset($_POST["action"])) {
        $newStatusId = $_POST["action"] == "accept" ? 2 : 3;
        $jobApplicationView->processJobApplicationAction($jobApplicationId, $newStatusId);
        header("Location: jobApplicationDetail.php?id=" . $jobApplicationId);
        exit();
    }
}
//Check if there is an 'id' parameter in the GET request.
if (isset($_GET["id"])) {
    $jobApplicationId = htmlspecialchars($_GET["id"]);
    $jobApplicationDetails = $jobApplicationView->fetchJobApplicationDetails($jobApplicationId);
} else {
    header("Location: index.php");
    exit();
}
if (!$jobApplicationDetails) {
    header("Location: index.php");
    exit();
}

$isLoggedInAsEmployer = Validator::isLoggedInAsEmployer();
$isJobAdOwner = Validator::ownsResource($jobApplicationView->fetchEmployerID($jobApplicationId));
?>
<div class="container">
    <div class="goBackLink">
        <i class="fa-solid fa-angle-left"></i>
        <?php echo '<a ' . ($isLoggedInAsEmployer && $isJobAdOwner ? 'href="listcompanyjobapplications.php?id=' . $jobApplicationDetails->jobListing_id . '"' : 'href="myJobApplications.php"') . '>' . translate("goBack") . '</a>'; ?>
    </div>
    <div class="row justify-content-center">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="jobApplicationId" value="<?php echo $jobApplicationId; ?>">
            <div class="row">
                <div class="job-title">
                    <?php echo translate("apply_for_position_header") ?>
                    <p><?php echo $jobApplicationDetails->position_name; ?></p>
                </div>
                <div class="col-md-4 grid-margin w-10">
                    <div class="card">
                        <div class="profile-card">
                            <!--NEED TO BE FIXED. GET UPLOADED PROFILE PICTURE FROM JOBSEEKER -->
                            <div class="profile-header">
                                <div class="profilePicture">
                                    <img src="http://localhost/jobbsokesystem/assets/uploadFiles/<?php echo urlencode(basename($jobApplicationDetails->profile_picture)); ?>"
                                        class="img img-fluid">
                                </div>
                            </div>

                            <div class="profile-content m-3">
                                <div class="header"><?php echo translate("fullName") . $jobApplicationDetails->name; ?>
                                </div>
                                <div class="header">
                                    <?php echo translate("phoneNumber") . $jobApplicationDetails->phone_number; ?>
                                </div>
                                <p class="header"><?php echo translate("email") . $jobApplicationDetails->email; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <p class="card-title font-weight-bold">
                                        <?php echo translate("candidate_number") . $jobApplicationDetails->jobApplicant_id; ?>
                                    </p>
                                </div>
                                <?php
                                $statusClass = "";
                                if (isset($jobApplicationDetails->application_status_name)) {
                                    if ($jobApplicationDetails->application_status_name === "Avslag") {
                                        $statusClass = "statusReject";
                                    }
                                }
                                ?>
                                <div class="col-3 applicationStatusBadge <?php echo $statusClass; ?>">
                                    <p>
                                        <?php echo $jobApplicationDetails->application_status_name; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <p class="header"><?php echo translate("coverLetter"); ?></p>
                            <p class="content"><?php echo $jobApplicationDetails->cover_letter; ?></p>
                            <p class="header"><?php echo translate("educationLevel"); ?></p>
                            <p class="content"> <?php echo $jobApplicationDetails->educationlevel_name; ?>
                            </p>
                            <p class="header"><?php echo translate("documents"); ?></p>
                            <ul list-group list-group-flush>
                                <a href="http://localhost/jobbsokesystem/assets/uploadFiles/<?php echo urlencode(basename($jobApplicationDetails->cv_path)); ?>"
                                    download>
                                    <li class="list-group-item mt-2"><b><?php echo translate("download_CV"); ?> </b><i
                                            class='fa-solid fa-download'></i></li>
                                </a>

                                <a href="http://localhost/jobbsokesystem/assets/uploadFiles/<?php echo urlencode(basename($jobApplicationDetails->diploma_path)); ?>"
                                    download>
                                    <li class="list-group-item mt-2"><b><?php echo translate("download_diploma"); ?>
                                        </b><i class='fa-solid fa-download'></i></li>
                                </a>
                            </ul>

                        </div>
                    </div>
                </div>
                <?php
                if ($isJobAdOwner) {
                    echo '
                    <div class="form-group col-md-12 text-center m-3">
                        <button type="submit" name="action" value="reject" class="btn btn-danger" style="margin-right: 5px;">' . translate("reject_button") . '</button>
                        <button type="submit" name="action" value="accept" class="btn btn-primary">' . translate("accept_button") . '</button>
                    </div>';
                }

                ?>
            </div>
        </form>
    </div>
</div>

<?php include "components/footer.php" ?>