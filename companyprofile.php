<?php include "components/header.php";
include "models/employer/employer.model.php";
include "models/employer/employer.viewModel.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";
if (!Validator::isLoggedIn()) {
    header("location: ./index.php");
    exit();
}
$employerToGet = isset($_GET["id"]) ? $_GET["id"] : 1;
$employerView = new EmployerViewModel($employerToGet);
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
            <img class="company-image" src="http://localhost/jobbsokesystem/assets/uploadFiles/<?php echo urlencode(basename($employerView->getProfileImage())); ?>">
        </div>

        <div class="col-md-8 col-lg-7 col-xl-6 offset-xl-1 profile-tab">
            <nav>
                <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo translate("about_subtitle") ?></button>
                    <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Kontakt</button> -->
                    <button class="nav-link" id="nav-job-ads-tab" data-bs-toggle="tab" data-bs-target="#nav-job-ads" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo translate("jobad_label") ?></button>
                    <!-- <button class="nav-link" id="nav-message-tab" data-bs-toggle="tab" data-bs-target="#nav-message" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Meldinger</button> -->
                </div>

            </nav>
            <?php ErrorHandler::displayError() ?>
            <?php ErrorHandler::displaySuccess() ?>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div>
                        <?php if (Validator::isLoggedIn() && Validator::isEmployer() && Validator::ownsResource($employerView->getEmployer_id())) { ?>
                            <a class=" btn editProfileButton" href='editcompanyprofile.php?id=<?php echo $employerView->getEmployer_id(); ?>'>Rediger Profil</a>
                        <?php } else {
                            echo " <button type='button' class='editProfileButton mt-3's> Send mail</button>";
                        }
                        ?>
                    </div>

                    <div class="profile-header">
                        <p><?php echo $employerView->getCompanyName() ?></p>
                    </div>
                    <p> <?php
                        $data = $employerView->getSummary();
                        if ($data) {
                            echo $data;
                        } else {
                            echo "Ingen oppsummering er registrert om deg i vår database";
                        }
                        ?> </p>
                    <div class="profile-header">
                        <p><?php echo translate("contact_button") ?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b><?php echo translate("employer_name_label") ?>: </b>
                                <?php echo $employerView->getCompanyName(); ?></li>
                            <li class="list-group-item"><b><?php echo translate("orgnumber_label") ?>:</b>
                                <?php echo $employerView->getOrganizationNumber(); ?></li>
                            <li class="list-group-item"><b><?php echo translate("phone_label") ?>:</b>
                                <?php echo $employerView->getPhonenumber(); ?></li>
                            <li class="list-group-item"><b><?php echo translate("email_label") ?>:</b>
                                <?php echo $employerView->getEmail(); ?></li>
                            <li class="list-group-item"><b><?php echo translate("location") ?>:</b>
                                <?php echo $employerView->getLocationName(); ?></li>
                            <li class="list-group-item"><a href="#">Besøk vår hjemmesider her</a></li>
                        </ul>
                    </div>
                    <p>

                    </p>


                </div>
                <div class="tab-pane fade" id="nav-job-ads" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row ">
                        <div class="row">
                            <div class="col-6 mt-3 mb-3">
                                <input type="text" class="form-control" id="searchText" aria-describedby="searchText" placeholder="Søk i fritekst (eks: 1,2,3)">
                            </div>
                            <button type="button" class="searchButtonIcon"> Søk
                                <!-- <i class="fas fa-search"></i> -->
                            </button>
                        </div>

                    </div>
                    <?php include "components/joblist.php" ?>
                    <?php include "components/joblist.php" ?>
                    <?php include "components/joblist.php" ?>
                    <?php include "components/joblist.php" ?>
                </div>


            </div>

        </div>
    </div>

</div>
<?php include "components/footer.php" ?>