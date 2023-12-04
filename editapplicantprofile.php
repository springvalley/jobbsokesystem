<?php include "components/header.php";
include ".\models\jobApplicant\jobApplicant.model.php";
include "./views/JobApplicationEditView.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $applicantToGet = (int)$_POST["applicant_id"];
} else {
    $applicantToGet = (int)$_GET["id"];
}
$jobApplicantView = new JobApplicantEditModel($applicantToGet);
if (!Validator::isLoggedIn() || !Validator::isJobApplicant() || !Validator::ownsResource($applicantToGet)) {
    header("location: ./index.php");
    exit();
}
?>

<div class="container">
    </script>
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="applicantprofile.php?id=<?php echo $applicantToGet ?>"><?php echo translate("goBack"); ?></a>
            </div>
        </div>
    </div>
    <?php ErrorHandler::displayError() ?>
    <?php ErrorHandler::displaySuccess() ?>
    <form action="controllers/jobApplicant.controller.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="jobapplicant_id" value=<?php echo $jobApplicantView->getApplicantID() ?>>
        <input type="hidden" name="type" value="edit">
        <div class="row">
            <!--Profile card start-->
            <div class="col-md-4 grid-margin w-10">
                <div class="card">
                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="profilePicture">
                                <img src="http://localhost/jobbsokesystem/assets/uploadFiles/<?php echo urlencode(basename($jobApplicantView->getProfileImage())); ?>"
                                    class="img img-fluid">
                            </div>
                            <!--Upload profile picture-->
                            <div class="text-center m-3">
                                <label for="uploadImage" class="btn-sm btn btn-info text-white">
                                    <input onchange="display_image_name(this.files[0].name)" type="file"
                                        name="profileImage" id="uploadImage" style="display: none;">
                                    <?php echo translate("edit_profileImage_button"); ?>
                                </label>
                                <small class="file_info text-muted"></small>
                            </div>

                            <div class="profile-content m-3">
                                <div class="header m-3">
                                    <?php echo translate("name_label") ?>
                                    <input class="form-control" type="text" name="name"
                                        value=<?php echo $jobApplicantView->getName(); ?>>
                                </div>
                                <div class="header m-3">
                                    <?php echo translate("phone_label") ?>
                                    <input class="form-control" type="text" name="phone"
                                        value=<?php echo $jobApplicantView->getPhoneNumber(); ?>>
                                </div>
                                <div class="header m-3">
                                    <?php echo translate("email_label") ?>
                                    <input class="form-control" type="text" name="email"
                                        value=<?php echo $jobApplicantView->getEmail(); ?>>
                                </div>
                                <div class="header m-3">
                                    <?php echo translate("location_placeholder") ?>
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
                                </div>
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
                                <p>
                                    <textarea class="form-control" rows=7 type="text" name="summary"
                                        value='<?php echo $jobApplicantView->getSummary(); ?>'></textarea>
                                </p>
                                <hr>
                                <p class="card-title"><?php echo translate("skills") ?></p>
                                <?php
                                $data = $jobApplicantView->getPossibleSkills();
                                $applicantSkills = $jobApplicantView->getSkillNames();

                                if (count($data) > 0) {
                                    echo "<select class='skillselect form-select' name='skills[]' multiple size='" . count($applicantSkills) . "'>";
                                    foreach ($data as $row) {
                                        $selected = in_array($row->skill_name, $applicantSkills) ? 'selected' : '';
                                        echo "<option $selected value='{$row->skill_id}'>{$row->skill_name}</option>";
                                    }
                                    echo '</select>';
                                } else {
                                    echo "<p>Ingen kompetanse er registrert i vår database.</p>";
                                }
                                ?>
                                <hr>
                                <div class="col-8">
                                    <p class="card-title"><?php echo translate("education") ?></p>
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
                                </div>
                                <hr>
                                <!--Upload CV-->
                                <div class="form-group col-md-8">
                                    <label for="formFile"
                                        class="card-title form-label"><?php echo translate("upload_new_cv") ?></label>
                                    <input class="form-control" type="file" name="cv" id="file">
                                    <a href="http://localhost/jobbsokesystem/assets/uploadFiles/<?php echo urlencode(basename($jobApplicantView->getCVFile())); ?>"
                                        target="_blank">
                                        <li class="list-group-item mt-2"><b><?php echo translate("view_cv") ?></b><i
                                                class='fa-solid fa-eye'></i>
                                        </li>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="text-center m-3">
                <button type="submit" name="submit"
                    class="btn btn-primary"><?php echo translate("save_button") ?></button>
            </div>

    </form>
</div>
</div>
</div>
<script>
function display_image_name(file_name) {
    var file_info = document.querySelector(".file_info").innerHTML = "<br><b>Valgt fil:</b> <br>" + file_name;
}
</script>

<?php include "components/footer.php" ?>