<?php include "components/header.php";
include ".\models\jobApplicant\jobApplicant.model.php";
include ".\models\jobApplicant\jobApplicanteditModel.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $applicantToGet = (int)$_POST["applicant_id"];
}else{
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

    <p class="errormessage"><?php
                                            if (isset($_GET["error"])) {
                                                $error = $_GET["error"];
                                                switch ($error) {
                                                    case "stmtFailed":
                                                        echo "En uventet feil skjedde, kontakt systemadministrator";
                                                        break;
                                                    case "emptyInputs":
                                                        echo "Vennligst fyll ut alle feltene";
                                                        break;
                                                    case "userNotFound":
                                                        echo "Brukeren ble ikke funnet";
                                                        break;
                                                    case "wrongPassword":
                                                        echo "Passordet er feil, vennligst prøv igjen";
                                                        break;
                                                    case "none":
                                                        echo "Brukeren ble opprettet!";
                                                        break;
                                                    case "invalidEmail":
                                                        echo "E-post addressen du har prøvd å bruke er ikke gyldig";
                                                        break;
                                                    case "invalidPassword":
                                                        echo "Passordet er ikke gyldig.";
                                                        break;
                                                    case "userExists":
                                                        echo "En bruker med denne epost adressen/telefonnummeret eksisterer allerede.";
                                                        break;
                                                    default:
                                                        echo "En uventet feil skjedde, kontakt systemadministrator";
                                                }
                                            };
                                            ?></p>

    <form action="controllers/jobApplicant.controller.php" method="post">
        <input type="hidden" name="jobapplicant_id" value=<?php echo $jobApplicantView->getApplicantID() ?>>
        <input type="hidden" name="type" value="edit">
        <div class="row">
            <div class="col-md-3 applicantProfile">
                <img src="img\test.jpg">
                <div class="contactInfo">
                    <p>Navn: <input type="text" name="name" value=<?php echo $jobApplicantView->getName(); ?>></p>
                    <p>Telefon: <input type="text" name="phone" value=<?php echo $jobApplicantView->getPhoneNumber(); ?>></p>
                    <p>E-post: <input type="text" name="email" value=<?php echo $jobApplicantView->getEmail(); ?>></p>
                    <p>Sted:
                    <select class="form-select" name="location">
                        <?php
                        $data = $jobApplicantView->getLocations();
                        $currentLocation = $jobApplicantView->getLocation_name();
                    foreach($data as $location){
                        if($location === $currentLocation){
                            echo '<option selected value="' . $location->location_id . '">' . $location->location_name . '</option>';
                        }else{
                            echo '<option value="' . $location->location_id . '">' . $location->location_name . '</option>';
                        }
                    } ?>
                    </select>
                    </p>

                </div>
            </div>
            <div class="col-md-9 profile-info">
                <div class="CV-header">
                    <p>Sammendrag:</p>
                </div>
                <textarea rows=4 cols=60 type="text" name="summary" value=<?php echo $jobApplicantView->getSummary(); ?>></textarea>
                <div class="CV-header">
                    <p>Kompetanse:</p>
                </div>
                <p>
                <div class="possibleskills">
                    <?php
                    $data = $jobApplicantView->getPossibleSkills();
                    $applicantSkills = $jobApplicantView->getSkillNames();

                    if (count($data) > 0) { ?>
                        <select class="skillselect" name="skills[]" multiple size=<?php echo count($applicantSkills) ?> <?php foreach ($data as $row) {
                                                                                                                            if (in_array($row->skill_name, $applicantSkills)) { ?> <option selected name=<?php echo $row->skill_name ?>  value=<?php echo $row->skill_id?>><?php echo $row->skill_name ?></option>
                        <?php } else { ?>
                            <option  name=<?php echo $row->skill_name ?>  value=<?php echo $row->skill_id?>><?php echo $row->skill_name ?></option>
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
                    <p>Utdanning:</p>
                </div>
                <p>
                <select class="form-select" name="educationlevel">
                    <?php 
                    $data = $jobApplicantView->getPossibleEducations();
                    $currentEducation = $jobApplicantView->getEducation();
                    foreach($data as $educationelevel){
                        if($educationelevel === $currentEducation){
                            echo '<option selected value="' . $educationelevel->educationlevel_id . '">' . $educationelevel->educationlevel_name . '</option>';
                        }else{
                            echo '<option value="' . $educationelevel->educationlevel_id . '">' . $educationelevel->educationlevel_name . '</option>';
                        }
                    } ?>
                </select>
                </p>
                <div class="CV-header">
                    <p>CV</p>
                    <button type="submit" class="btn btn-success">Last opp ny CV</button>
                    <p class="text-danger">OBS: Hvis du laster opp en ny CV vil din gamle bli slettet!</p>
                </div>
                    <button type="submit" name="submit" class="btn btn-success">Lagre endringer</button>
    </form>
</div>
</div>
</div>

<?php include "components/footer.php" ?>