<?php include "components/header.php";
include "models/jobApplicant.model.php";
include "models/jobApplicant.viewModel.php";
$applicantToGet = isset($_GET["id"]) ? $_GET["id"] : 11;
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
            <button type="button" class="editProfileButton">Send melding</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 applicantProfile">
            <img src="img\test.jpg">
            <div class="contactInfo">
                <p>Navn: <?php echo $jobApplicantView->getName() ?></p>
                <p>Telefon: <?php echo $jobApplicantView->getPhoneNumber() ?></p>
                <p>E-Post: <?php echo $jobApplicantView->getEmail() ?></p>
                <p>Sted: <?php echo $jobApplicantView->getLocation_name() ?></p>
            </div>
        </div>
        <div class="col-md-9 profile-info">
            <div class="CV-header">
                <p>Sammendrag:</p>
            </div>
            <p> <?php echo $jobApplicantView->getSummary() ?></p>
            <div class="CV-header">
                <p>Kompetanse:</p>
            </div>
            <p>
            <ul>
                <?php
                $data = $jobApplicantView->getSkills();
                if(count($data) > 0){
                    foreach ($data as $row) {
                        echo "<li><span style='font-weight:bold'>" . $row->skill_name . "</span></li>";
                    }
                }else{
                    echo "Ingen kompetanse er registrert i vår database";
                }
                    ?>
            </ul>
            </p>
            <div class="CV-header">
                <p>Utdanning:</p>
            </div>
            <p>
            <ul>
                <?php
                $data = $jobApplicantView->getEducation();
                if(count($data) > 0){

                    foreach ($data as $education) {
                        echo "<li><span style='font-weight:bold'>" . $education->education_name . "</span> Sted:" . $education->location_name. "</li>";
                    }
                }else{
                    echo "Ingen utdanning er registrert i vår database";
                }
                ?>
            </ul>
            </p>
            <div class="CV-header">
                <p>CV</p>
                <form>
                    <button type="submit" class="btn btn-success">Last ned CV</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php include "components/footer.php" ?>