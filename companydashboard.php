<?php
include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/models/employer/employer.model.php";
require_once "/xampp/htdocs/jobbsokesystem/views/EmployerView.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";

$employerToGet = isset($_GET["id"]) ? $_GET["id"] : 1;
if (!$employerToGet) {
    header("Location: ./index.php");
    exit();
}

$employerView = new EmployerViewModel($employerToGet);

if (!Validator::isLoggedIn() || !Validator::isEmployer() || !Validator::ownsResource($employerView->getEmployer_id())) {
    header("location: ./index.php");
    exit();
}
?>
<div class="container">
    <h1 class="db-header"><?php echo translate("dashboard_header") ?></h1>
    <div class="box-container">
        <div class="row">
            <!--Company Profile box start-->
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card1">
                        <p class="card-title mb-5"><?php echo translate("company_profile_label") ?></p>
                    </div>
                    <div class="card-footer footer1 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="companyprofile.php?id=<?php echo $_SESSION["id"]; ?>">
                            <?php echo translate("see_details_button"); ?>
                        </a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!--Company Profile box end-->

            <!--Company JobListings box start-->
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card2">
                        <p class="card-title mb-1"><?php echo translate("jobad_label") ?></p>
                        <p class="card-title mb-3">
                            <?php echo $employerView->getTotalNumberOfJobListingsByEmployerId($employerView->getEmployer_id()); ?>
                        </p>
                    </div>
                    <div class="card-footer footer2 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="companyjobads.php?id=<?php echo $_SESSION["id"]; ?>">
                            <?php echo translate("see_details_button"); ?>

                        </a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!--Company JobListings box end-->

            <!--Company JobApplications box start-->
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card3">
                        <p class="card-title mb-1"><?php echo translate("applications_label") ?></p>
                        <p class="card-title mb-3">
                            <?php echo $employerView->getTotalNumberOfJobApplicationsByEmployerId($employerView->getEmployer_id()); ?>
                        </p>
                    </div>
                    <div class="card-footer footer3 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link"
                            href="jobapplications-overview.php?id=<?php echo $employerView->getEmployer_id(); ?>"><?php echo translate("see_details_button") ?></a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!--Company JobApplications box end-->

            <!--Company JobApplicants box start-->
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card4">
                        <p class="card-title mb-1"><?php echo translate("candidates_label") ?></p>
                        <p class="card-title mb-3">
                            <?php echo $employerView->getTotalNumberOfJobApplicants($employerView->getEmployer_id()); ?>
                        </p>
                    </div>
                    <div class="card-footer footer4 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link"
                            href="total-candidates-overview.php?id=<?php echo $employerView->getEmployer_id(); ?>"><?php echo translate("see_details_button") ?></a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!--Company JobApplicants box end-->

            <!--Company Messages box start-->
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card5">
                        <p class="card-title mb-1"><?php echo translate("messages_label") ?></p>
                        <p class="card-title mb-3">NULL</p>
                    </div>
                    <div class="card-footer footer5 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="#"><?php echo translate("see_details_button") ?></a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!--Company Messages box end-->

        </div>

    </div>
</div>

<?php include "components/footer.php" ?>