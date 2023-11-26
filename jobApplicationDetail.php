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
    $jobApplicationDetail = $jobApplicationView->fetchJobApplication($jobApplicationId);
} else {
    header("Location: index.php");
    exit();
}
if (!$jobApplicationDetail) {
    header("Location: index.php");
    exit();
}

$isLoggedInAsEmployer = Validator::isLoggedInAsEmployer();
$isJobAdOwner = Validator::isJobAdOwner($jobApplicationDetail->company_name);
?>
<div class="container">
    <div class="goBackLink">
        <i class="fa-solid fa-angle-left"></i>
        <?php echo '<a ' . ($isLoggedInAsEmployer && $isJobAdOwner ? 'href="listcompanyjobapplications.php?id=' . $jobApplicationDetail->jobListing_id . '"' : 'href="myJobApplications.php"') . '>Tilbake</a>'; ?>
    </div>
    <div class="row justify-content-center">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="jobApplicationId" value="<?php echo $jobApplicationId; ?>">
            <div class="row">
                <div class="job-title">
                    <p> Søknad på stilling som: <?php echo $jobApplicationDetail->position_name; ?></p>
                </div>
                <div class="col-md-4 grid-margin w-10">
                    <div class="card">
                        <div class="profile-card">
                            <!--NEED TO BE FIXED. GET UPLOADED PROFILE PICTURE FROM JOBSEEKER -->
                            <div class="profile-header">
                                <div class="profilePicture">
                                    <img src="./img/joseph_profile_image.jpg" class="img img-fluid">
                                </div>
                            </div>

                            <div class="profile-content m-3">
                                <div class="header">Fullnavn: <?php echo $jobApplicationDetail->name; ?></div>
                                <div class="header">Telefonnr.: <?php echo $jobApplicationDetail->phone_number; ?>
                                </div>
                                <p class="header">E-post: <?php echo $jobApplicationDetail->email; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <p class="card-title font-weight-bold">Kandidat nr.:
                                        <?php echo $jobApplicationDetail->jobApplicant_id; ?> </p>
                                </div>
                                <?php
                                $statusClass = "";
                                if (isset($jobApplicationDetail->application_status_name)) {
                                    if ($jobApplicationDetail->application_status_name === "Avslag") {
                                        $statusClass = "statusReject";
                                    }
                                }
                                ?>
                                <div class="col-3 applicationStatusBadge <?php echo $statusClass; ?>">
                                    <p>
                                        <?php echo $jobApplicationDetail->application_status_name; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <p class="header">Søknadsbrev</p>
                            <p class="content"><?php echo $jobApplicationDetail->cover_letter; ?></p>
                            <p class="header">Utdanningsnivå:</p>
                            <p class="content"> <?php echo $jobApplicationDetail->educationlevel_name; ?>
                            </p>
                            <p class="header">Dokumenter</p>
                            <ul list-group list-group-flush>
                                <li class="list-group-item mt-2"><b>Last ned CV her
                                        <?php echo $jobApplicationDetail->cv_path; ?> </b> <i class="fa-solid fa-download"></i></li>
                                <li class="list-group-item mt-2"><b>Last ned søknadsbrev her</b><i class="fa-solid fa-download"></i></li>
                                <li class="list-group-item mt-2"><b>Last ned diploma her </b><i class="fa-solid fa-download"></i></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <?php
                if ($isJobAdOwner) {
                    echo '
                    <div class="form-group col-md-12 text-center m-3">
                        <button type="submit" name="action" value="reject" class="btn btn-danger">Avvis</button>
                        <button type="submit" name="action" value="accept" class="btn btn-primary">Aksepter</button>
                    </div>';
                }

                ?>
            </div>
        </form>
    </div>
</div>

<?php include "components/footer.php" ?>