<?php include "components/header.php";
include ".\models\jobApplicant\jobApplicant.model.php";
include ".\models\jobApplicant\jobApplicanteditModel.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $applicantToGet = (int)$_POST["applicant_id"];
} else {
    $applicantToGet = (int)$_GET["id"];
}
$jobApplicantView = new JobApplicantEditModel($applicantToGet);
?>

<div class="container">
    </script>
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="foremployer.php">Tilbake søkeresultat</a>
            </div>
        </div>
    </div>
    <?php ErrorHandler::displayError() ?>
    <?php ErrorHandler::displaySuccess() ?>
    <form action="controllers/jobApplicant.controller.php" method="post">
        <input type="hidden" name="jobapplicant_id" value=<?php echo $jobApplicantView->getApplicantID() ?>>
        <input type="hidden" name="type" value="edit">
        <div class="row">
            <div class="col-md-3 applicantProfile">
                <img src="img\test.jpg">
                <div class="contactInfo">
                    <p><?php echo translate("name_label")?>: <input type="text" name="name" value=<?php echo $jobApplicantView->getName(); ?>></p>
                    <p><?php echo translate("phone_label")?>: <input type="text" name="phone" value=<?php echo $jobApplicantView->getPhoneNumber(); ?>></p>
                    <p><?php echo translate("email_label")?>: <input type="text" name="email" value=<?php echo $jobApplicantView->getEmail(); ?>></p>
                    <p><?php echo translate("location_placeholder")?>:
                        <select class="form-select" name="location">
                            <?php
                            $data = $jobApplicantView->getLocations();
                            $currentLocation = $jobApplicantView->getLocation_name();
                            foreach ($data as $location) {
                                if ($location->location_name == $currentLocation) {
                                    echo '<option selected value="' . $location->location_id . '">' . $location->location_name . '</option>';
                                } else {
                                    echo '<option value="' . $location->location_id . '">' . $location->location_name . '</option>';
                                }
                            } ?>
                        </select>
                    </p>

                </div>
            </div>
            <div class="col-md-9 profile-info">
                <div class="CV-header">
                    <p><?php echo translate("summary")?>:</p>
                </div>
                <textarea rows=4 cols=60 type="text" name="summary" value='<?php echo $jobApplicantView->getSummary(); ?>'></textarea>
                <div class="CV-header">
                    <p><?php echo translate("skills")?>:</p>
                </div>
                <p>
                <div class="possibleskills">
                    <?php
                    $data = $jobApplicantView->getPossibleSkills();
                    $applicantSkills = $jobApplicantView->getSkillNames();

                    if (count($data) > 0) { ?>
                        <select class="skillselect" name="skills[]" multiple size=<?php echo count($applicantSkills) ?> <?php foreach ($data as $row) {
                                                                                                                            if (in_array($row->skill_name, $applicantSkills)) { ?> <option selected name=<?php echo $row->skill_name ?> value=<?php echo $row->skill_id ?>><?php echo $row->skill_name ?></option>
                        <?php } else { ?>
                            <option name=<?php echo $row->skill_name ?> value=<?php echo $row->skill_id ?>><?php echo $row->skill_name ?></option>
                        <?php }
                        ?>
                <?php }
                                                                                                                    } else {
                                                                                                                        echo "Ingen kompetanse er registrert i vår database";
                                                                                                                    }
                ?>
                        </select>
                </div>
                </p>
                <div style="clear:both"></div>
                <div class="CV-header">
                    <p><?php echo translate("education")?>:</p>
                </div>
                <p>
                    <select class="form-select" name="educationlevel">
                        <?php
                        $data = $jobApplicantView->getPossibleEducations();
                        $currentEducation = $jobApplicantView->getEducation();
                        foreach ($data as $educationelevel) {
                            if ($educationelevel->educationlevel_name === $currentEducation) {
                                echo '<option selected value="' . $educationelevel->educationlevel_id . '">' . $educationelevel->educationlevel_name . '</option>';
                            } else {
                                echo '<option value="' . $educationelevel->educationlevel_id . '">' . $educationelevel->educationlevel_name . '</option>';
                            }
                        } ?>
                    </select>
                </p>
                <div class="CV-header">
                    <p>CV</p>
                    <button type="submit" class="btn btn-success"><?php echo translate("cv_label")?></button>
                </div>
                <button type="submit" name="submit" class="btn btn-success"><?php echo translate("save_button")?></button>
    </form>
</div>
</div>
</div>

<?php include "components/footer.php" ?>