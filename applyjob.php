<?php include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/views/JobListingView.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";

$helperModel = new Helper();

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}
$jobListingId = $_GET["id"];

//You have to be signed in to apply for a job
if (!isset($_SESSION["id"])) {
    header("location: index.php");
    exit();
}

$jobListingView = new JobListingview();
$jobAdDetail = $jobListingView->fetchJobAdByJobListingId($jobListingId);
?>
<div class="container">
    <div class="goBackLink">
        <i class="fa-solid fa-angle-left"></i>
        <a href="<?php echo 'jobadvertisementdetail.php?id=' . $jobAdDetail->jobListing_id ?>">Tilbake jobbannonsen</a>
    </div>
    <div class="flex-container justify-content-start">
        <button class="autoFillInfoButton" style="margin-bottom: 10px;" onclick=autofill()><?php echo translate("autofill")?></button>
    </div>
    <div class="row justify-content-center">
        <form action="./controllers/jobApplicant.controller.php" method="POST">
            <input name="type" value="apply" hidden />
            <input name="applicantid" value=<?php echo $_SESSION["id"] ?> hidden>
            <input name="jobListing_id" value=<?php echo $jobAdDetail->jobListing_id; ?> hidden>
            <div class="job-title">
            <?php echo translate("apply_for")?>
                <p style="color: #082E90;"><?php echo $jobAdDetail->position_name; ?></p>
            </div>
            <div class="row">
                <?php ErrorHandler::displayError() ?>
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="name"><?php echo translate("name_label")?></label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="<?php echo translate("name_placeholder")?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="email"><?php echo translate("email_label")?></label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="<?php echo translate("email_placeholder")?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="phone"><?php echo translate("phone_label")?></label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="<?php echo translate("phone_placeholder")?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="lastjob"><?php echo translate("last_position_label")?></label>
                            <input type="text" class="form-control" name="lastjob" id="lastjob"
                                aria-describedby="lastjob" placeholder="<?php echo translate("last_position_label")?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="location"><?php echo translate("education_label")?></label>
                            <select class="form-select" name="education">
                                <option selected value="0"><?php echo translate("education_placeholder")?></option>
                                <?php
                                $data = $helperModel->getAllEducations();
                                foreach ($data as $education) {
                                    echo '<option value="' . $education->educationlevel_id . '">' . $education->educationlevel_name . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group col-md-8">
                        <label for="coverletter"><?php echo translate("motivational_text_label")?></label>
                        <textarea class="form-control" rows="5" id="coverletter" name="coverletter"
                            aria-describedby="coverletter"
                            placeholder="<?php echo translate("motivational_text_placeholder")?>"></textarea>

                    </div>
                    <div class="form-group col-md-8">
                        <label for="formFile" class="form-label"><?php echo translate("cv_label")?></label>
                        <input class="form-control" type="file" id="cvUpload">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="formFile" class="form-label"><?php echo translate("upload_motivation_label")?></label>
                        <input class="form-control" type="file" id="coverLetterUpload">
                    </div>
                </div>
                <div class="form-group text-center mt-3">
                    <!--Må lage en script som viser til jobbsøker at søknaden har sendt etter å ha trykke på "Send Søknad"-->
                    <button id="applyjobb-button" type="submit" class="btn btn-primary"><?php echo translate("apply_button")?></button>
                </div>
            </div>
    </div>
    </form>

</div>

<script>
function autofill() {
    document.getElementById("name").value = "<?php echo $_SESSION["name"]; ?>";
    document.getElementById("email").value = "<?php echo $_SESSION["email"]; ?>";
    document.getElementById("phone").value = "<?php echo $_SESSION["phone"]; ?>";
}
</script>
<?php include "components/footer.php" ?>