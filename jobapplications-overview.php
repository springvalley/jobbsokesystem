<?php
include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/models/employer/employer.model.php";
require_once "/xampp/htdocs/jobbsokesystem/views/EmployerView.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";

$employerToGet = isset($_GET["id"]) ? $_GET["id"] : 1;
if (!$employerToGet) {
    header("Location: ./index.php");
    exit();
}

$employerView = new EmployerViewModel($employerToGet);

if (!Validator::isLoggedIn() || !Validator::isEmployer() || !Validator::ownsResource($employerView->getEmployer_id())) {
    header("location: ./index.php");
    exit();
}
$overviewJobApplications = $employerView->displayOverviewOfJobApplications($employerView->getEmployer_id());
if (empty($overviewJobApplications)) {
    header("Location: ./companydashboard.php?id=" . $_SESSION['id']);
    exit();
}
?>
<div class="container">
    <h1 class=""><?php echo translate("overview_jobApplications"); ?></h1>
    <div>
        <div class="goBackLink mb-3">
            <i class="fa-solid fa-angle-left"></i>
            <?php
            if (Validator::ownsResource($employerView->getEmployer_id())) {
                echo '<a
                    href="companydashboard.php?id=' . $employerView->getEmployer_id() . '">' . translate("goBackToDashboard_button") . '</a>';
            }
            ?>
        </div>
    </div>
    <table class=" table table-bordered m-3">
        <thead>
            <tr class="">
                <th scope="col"><?php echo translate("index"); ?></th>
                <th scope="col"><?php echo translate("job_position"); ?></th>
                <th scope="col"><?php echo translate("location"); ?></th>
                <th scope="col"><?php echo translate("form_of_employment"); ?></th>
                <th scope="col"><?php echo translate("total_count_jobApplications") ?></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php
        foreach ($overviewJobApplications as $overviewJobApplication) {
            echo '
            <tbody>
            <tr>
                <th scope="row">' . $overviewJobApplication->index . '</th>
                <td>' . $overviewJobApplication->position_name . '</td>
                <td>' . $overviewJobApplication->location_name . '</td>
                <td>' . $overviewJobApplication->jobType . '</td>
                <td>' . $overviewJobApplication->totalJobApplications . '</td>
                <td><a href="listcompanyjobapplications.php?id=' . $overviewJobApplication->jobListing_id . '">' . translate("view_all_jobApplication_button") . '</a></td>
            </tr>
        </tbody>            
            ';
        }
        ?>
    </table>

</div>

<?php include "components/footer.php" ?>