<?php include "components/header.php";
include "models/employer/employer.model.php";
include "models/employer/employer.editModel.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";


$employerToGet = isset($_GET["id"]) ? $_GET["id"] : 1;
$employerView = new EmployerEditModel($employerToGet);
if(!Validator::isLoggedIn() || !Validator::isEmployer() || !Validator::ownsResource($employerToGet)){
    header("location: ./index.php");
    exit();
}
?>
<div class="container">
    <!--Denne linken må endres for at det ikke vises seg til jobbsøker-->
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="companydashboard.php">Tilbake Dashboard</a>
            </div>
        </div>
    </div>

    <div class="row d-flex align-items-center justify-content-center company-profile">
        <div class="col-md-7 col-lg-5 col-xl-5">
            <img src="img/img_company.jpg" class="company-image">
        </div>
        <div class="col-md-8 col-lg-7 col-xl-6 offset-xl-1 profile-tab">
            <nav>
                <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Om bedrift</button>
                    <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Kontakt</button> -->
                </div>
            </nav>
            <?php ErrorHandler::displayError() ?>
            <?php ErrorHandler::displaySuccess() ?>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form method="post" action="./controllers/employer.controller.php">
                        <input name="type" value="edit" hidden />
                        <input name="employer_id" value=<?php echo $employerView->getEmployer_id(); ?> hidden />
                        <div>
                            <button type='submit' class='editProfileButton mt-3'> Lagre endringer</button>
                        </div>

                        <div class="profile-header">
                            <p><?php echo $employerView->getCompanyName() ?></p>
                        </div>
                        <p>
                            <textarea name="summary" rows=4 cols=30 value=<?php $employerView->getSummary(); ?>></textarea>
                        </p>
                        <select class="form-select" name="location">
                            <?php
                            $data = $employerView->getLocations();
                            $currentLocation = $employerView->getLocation_name();
                            foreach ($data as $location) {
                                if ($location->location_name == $currentLocation) {
                                    echo '<option selected value="' . $location->location_id . '">' . $location->location_name . '</option>';
                                } else {
                                    echo '<option value="' . $location->location_id . '">' . $location->location_name . '</option>';
                                }
                            } ?>
                        </select>
                        <div class="profile-header">
                            <p>Kontakt oss</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Bedriftsnavn: </b><input name="name" value=<?php echo $employerView->getCompanyName(); ?> /></li>
                                <li class="list-group-item"><b>Organisasjon nr.:</b> <input name="orgNumber" value=<?php echo $employerView->getOrganizationNumber(); ?>></li>
                                <li class="list-group-item"><b>Bedriftstelefon nr.:</b> <input name="phone" value=<?php echo $employerView->getPhonenumber(); ?>></li>
                                <li class="list-group-item"><b>E-post:</b> <input name="email" value=<?php echo $employerView->getEmail(); ?>></li>
                                <li class="list-group-item"><a href="#">Besøk vår hjemmesider her</a></li>
                            </ul>
                        </div>
                </div>
                </form>
            </div>

        </div>
    </div>

</div>
<?php include "components/footer.php" ?>