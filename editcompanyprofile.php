<?php include "components/header.php";
include "models/employer/employer.model.php";
include "./views/EmployerEditView.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";


$employerToGet = isset($_GET["id"]) ? $_GET["id"] : 1;
$employerView = new EmployerEditModel($employerToGet);
if (!Validator::isLoggedIn() || !Validator::isEmployer() || !Validator::ownsResource($employerToGet)) {
    header("location: ./index.php");
    exit();
}
?>
<div class="container">

    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="companydashboard.php?id=<?php echo $employerView->getEmployer_id() ?>"><?php echo translate("goBackToDashboard_button"); ?></a>
            </div>
        </div>
    </div>
    <form method="post" action="./controllers/employer.controller.php" enctype="multipart/form-data">
        <div class="row d-flex align-items-center justify-content-center company-profile">
            <!--Upload Company Profile Image-->
            <div class="col-md-7 col-lg-5 col-xl-5">
                <img class="company-image" src="http://localhost/jobbsokesystem/assets/uploadFiles/<?php echo urlencode(basename($employerView->getProfileImage())); ?>">
                <div class="text-center m-3">
                    <label for="uploadImage" class="btn-sm btn btn-info text-white">
                        <input onchange="display_image_name(this.files[0].name)" type="file" name="profileImage" id="uploadImage" style="display: none;">
                        <?php echo translate("edit_profileImage_button"); ?>
                    </label>
                    <small class="file_info text-muted"></small>
                </div>
            </div>

            <div class="col-md-8 col-lg-7 col-xl-6 offset-xl-1 profile-tab">
                <nav>
                    <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo translate("about_company") ?></button>
                    </div>
                </nav>
                <?php ErrorHandler::displayError() ?>
                <?php ErrorHandler::displaySuccess() ?>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">

                        <input name="type" value="edit" hidden />
                        <input name="employer_id" value=<?php echo $employerView->getEmployer_id(); ?> hidden />
                        <div>
                            <button type='submit' class='editProfileButton mt-3'><?php echo translate("save_changes_button"); ?></button>
                        </div>

                        <div class="profile-header">
                            <p><?php echo $employerView->getCompanyName() ?></p>
                        </div>
                        <p>
                            <textarea class="form-control" name="summary" rows=10 cols=30 value=<?php $employerView->getSummary(); ?>></textarea>
                        </p>
                        <div class="col-md-6">
                            <label for="location" class="card-title"><?php echo translate("location"); ?></label>
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
                        </div>
                        <div class="profile-header">
                            <p><?php echo translate("contact_us"); ?></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b><?php echo translate("company_name"); ?> </b>
                                    <div class="col-md-6">
                                        <input class="form-control" name="name" value=<?php echo $employerView->getCompanyName(); ?> />
                                    </div>
                                </li>
                                <li class="list-group-item"><b><?php echo translate("organisation_number"); ?></b>
                                    <div class="col-md-6">
                                        <input class="form-control" name="orgNumber" value=<?php echo $employerView->getOrganizationNumber(); ?>>
                                    </div>
                                </li>
                                <li class="list-group-item"><b><?php echo translate("telephone_number"); ?></b>
                                    <div class="col-md-6">
                                        <input class="form-control" name="phone" value=<?php echo $employerView->getPhonenumber(); ?>>
                                    </div>
                                </li>
                                <li class="list-group-item"><b><?php echo translate("email"); ?></b>
                                    <div class="col-md-6">
                                        <input class="form-control" name="email" value=<?php echo $employerView->getEmail(); ?>>
                                    </div>
                                </li>
                                <li class="list-group-item"><a href="#"><?php echo translate("visit_website"); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function display_image_name(file_name) {
        var file_info = document.querySelector(".file_info").innerHTML = "<br><b>Valgt fil:</b> <br>" + file_name;
    }
</script>
<?php include "components/footer.php" ?>