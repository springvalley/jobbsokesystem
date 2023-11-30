<?php include "components/header.php";
include "models/jobApplicant/jobApplicant.model.php";
include "models/jobApplicant/jobApplicant.viewModel.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php"; 
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";

if (!Validator::isLoggedIn()) {
    header("location: index.php");
}
$applicantToGet = isset($_GET["id"]) ? $_GET["id"] : 1;
$jobApplicantView = new JobApplicantViewModel($applicantToGet);
?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="foremployer.php">Tilbake søkeresultat</a>
            </div>
        </div>
        <div>
            <?php if (Validator::isLoggedIn() && Validator::ownsResource($jobApplicantView->getApplicantID()) && Validator::isJobApplicant()) { ?>
                <form action="editapplicantprofile.php" method="post">
                    <input type="hidden" name="applicant_id" value=<?php echo $jobApplicantView->getApplicantID() ?>>
                    <button type="submit" class="editProfileButton"><?php echo translate("edit_profile_button")?></button>
                </form>
            <?php  } ?>
        </div>
    </div>
    <?php ErrorHandler::displayError() ?>
    <?php ErrorHandler::displaySuccess() ?>
    <div class="row">
        <div class="col-md-3 applicantProfile">
            <img src="img\test.jpg">
            <div class="contactInfo">
                <p><?php echo translate("name_label")?>: <?php echo $jobApplicantView->getName() ?></p>
                <p><?php echo translate("phone_label")?>: <?php echo $jobApplicantView->getPhoneNumber() ?></p>
                <p><?php echo translate("email_label")?>: <?php echo $jobApplicantView->getEmail() ?></p>
                <p><?php echo translate("location")?>: <?php echo $jobApplicantView->getLocation_name() ?></p>
            </div>
        </div>
        <div class="col-md-9 profile-info">
            <div class="CV-header">
                <p><?php echo translate("summary")?>:</p>
            </div>
            <p> <?php
                $data = $jobApplicantView->getSummary();
                if ($data) {
                    echo $data;
                } else {
                    echo "Det er ikke et sammendrag om deg registrert i vår database.";
                }
                echo $jobApplicantView->getSummary() ?></p>
            <div class="CV-header">
                <p><?php echo translate("skills")?>:</p>
            </div>
            <p>
            <ul>
                <?php
                $data = $jobApplicantView->getSkills();
                if (count($data) > 0) {
                    foreach ($data as $row) {
                        echo "<li><span style='font-weight:bold'>" . $row->skill_name . "</span></li>";
                    }
                } else {
                    echo "Ingen kompetanse er registrert i vår database.";
                }
                ?>
            </ul>
            </p>
            <div class="CV-header">
                <p><?php echo translate("education")?>:</p>
            </div>
            <p>
                <?php
                $data = $jobApplicantView->getEducation();
                if ($data) {
                    echo $data->educationlevel_name;
                } else {
                    echo "Ingen utdanning er registrert i vår database.";
                }
                ?>
            </p>
            <div class="CV-header">
                <p>CV</p>
                <form>
                    <button type="submit" class="btn btn-success"><?php echo translate("download_resume_button")?>:</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php include "components/footer.php" ?>