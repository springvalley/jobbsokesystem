<?php

include "components/header.php";
include "./models/jobApplicant/jobApplicant.model.php";
include "./views/JobApplicantView.php";
require_once "./library/errorhandler.php";
require_once "./library/languages/lang.php";

if (!Validator::isLoggedIn()) {
    header("location: index.php");
    exit();
}
$applicantToGet = $_GET["id"];
$jobApplicantView = new JobApplicantViewModel($applicantToGet);
?>
<div class="container">
    <div class="flex-container">
        <div>
            <!-- <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="foremployer.php">Tilbake søkeresultat</a>
            </div> -->
        </div>
        <div>
            <?php if (Validator::isLoggedIn() && Validator::ownsResource($jobApplicantView->getApplicantID()) && Validator::isJobApplicant()) { ?>
                <form action="editapplicantprofile.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="applicant_id" value=<?php echo $jobApplicantView->getApplicantID() ?>>
                    <button type="submit" class="editProfileButton m-3"><?php echo translate("edit_profile_button") ?></button>
                </form>
            <?php  } ?>
        </div>
    </div>
    <?php ErrorHandler::displayError() ?>
    <?php ErrorHandler::displaySuccess() ?>
    <div class="row justify-content-center">
        <div class="row">
            <!--Profile card start-->
            <div class="col-md-4 grid-margin w-10">
                <div class="card">
                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="profilePicture">
                                <img src="http://localhost/jobbsokesystem/assets/uploadFiles/<?php echo urlencode(basename($jobApplicantView->getProfileImage())); ?>" class="img img-fluid">
                            </div>
                        </div>
                        <div class="profile-content m-3">
                            <div class="header">
                                <?php echo translate("name_label") ?>: <?php echo $jobApplicantView->getName() ?>
                            </div>
                            <div class="header">
                                <?php echo translate("phone_label") ?>:
                                <?php echo $jobApplicantView->getPhoneNumber() ?>
                            </div>
                            <div class="header">
                                <?php echo translate("email_label") ?>: <?php echo $jobApplicantView->getEmail() ?>
                            </div>
                            <div class="header">
                                <?php echo translate("location") ?>: <?php echo $jobApplicantView->getLocation_name() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Profile card end-->
            <div class="col-md-8 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="card-title font-weight-bold"><?php echo translate("about_me") ?></p>
                                <p class="content">
                                    <?php
                                    $data = $jobApplicantView->getSummary();
                                    if ($data) {
                                        echo $data;
                                    } else {
                                        echo "Det er ikke et sammendrag om deg registrert i vår database.";
                                    }
                                    echo $jobApplicantView->getSummary()
                                    ?>
                                </p>
                                <hr>
                            </div>
                        </div>
                        <p class="card-title"><?php echo translate("skills") ?></p>
                        <p>
                        <ul>
                            <?php
                            $data = $jobApplicantView->getSkills();
                            if (count($data) > 0) {
                                foreach ($data as $row) {
                                    echo "<li><span>" . $row->skill_name . "</span></li>";
                                }
                            } else {
                                echo "Ingen kompetanse er registrert i vår database.";
                            }
                            ?>
                        </ul>
                        </p>
                        <hr>
                        <p class="card-title"><?php echo translate("education") ?></p>
                        <p class="content">
                            <?php
                            $data = $jobApplicantView->getEducation();
                            if ($data) {
                                echo $data->educationlevel_name;
                            } else {
                                echo "Ingen utdanning er registrert i vår database.";
                            }
                            ?>
                        </p>
                        <hr>
                        <p class="header"><?php echo translate("download_cv_label") ?></p>
                        <a href="http://localhost/jobbsokesystem/assets/uploadFiles/<?php echo urlencode(basename($jobApplicantView->getCVFile())); ?>" target="_blank">
                            <li class="list-group-item mt-2"><b><?php echo translate("view_cv"); ?> </b><i class='fa-solid fa-eye'></i>
                            </li>
                        </a>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "components/footer.php" ?>