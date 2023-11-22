<?php include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/views/JobListingView.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";

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
        <button class="autoFillInfoButton" style="margin-bottom: 10px;" onclick=autofill()>Autofyll min
            informasjon</button>
    </div>
    <div class="row justify-content-center">
        <form action="./controllers/jobApplicant.controller.php" method="POST">
            <input name="type" value="apply" hidden />
            <input name="applicantid" value=<?php echo $_SESSION["id"] ?> hidden>
            <input name="jobListing_id" value=<?php echo $jobAdDetail->jobListing_id; ?> hidden>
            <div class="job-title">
                Søk på stilling som:
                <p style="color: #082E90;"><?php echo $jobAdDetail->position_name; ?></p>
            </div>
            <div class="row">
                <?php ErrorHandler::displayError() ?>
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="name">Navn</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Skriv inn ditt navn">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="email">E-post</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Skriv inn din email">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="phone">Telefonnummer</label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="Skriv inn ditt telefonnummer">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="lastjob">Nåværende eller siste stilling</label>
                            <input type="text" class="form-control" name="lastjob" id="lastjob"
                                aria-describedby="lastjob" placeholder="Nåværende eller siste stilling">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="location">Hva er din høyeste utdanning?</label>
                            <select class="form-select" name="education">
                                <option selected value="0">Velg Utdanningsnivå</option>
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
                        <label for="coverletter">Søknadstekst</label>
                        <textarea class="form-control" rows="5" id="coverletter" name="coverletter"
                            aria-describedby="coverletter"
                            placeholder="Du kan skrive inn søknadstekst her..."></textarea>

                    </div>
                    <div class="form-group col-md-8">
                        <label for="formFile" class="form-label">Last opp CV her</label>
                        <input class="form-control" type="file" id="cvUpload">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="formFile" class="form-label">Last opp motivasjonsbrev</label>
                        <input class="form-control" type="file" id="coverLetterUpload">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="formFile" class="form-label">Andre dokumenter</label>
                        <input class="form-control" type="file" id="otherDocumentsUpload">
                    </div>

                </div>
                <div class="form-group text-center mt-3">
                    <!--Må lage en script som viser til jobbsøker at søknaden har sendt etter å ha trykke på "Send Søknad"-->
                    <button id="applyjobb-button" type="submit" class="btn btn-primary">Send søknad</button>
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