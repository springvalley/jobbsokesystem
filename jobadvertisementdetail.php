<?php
include "components/header.php";
require_once "../jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "../jobbsokesystem/views/JobListingView.php";
require_once "../jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";
require_once "/xampp/htdocs/jobbsokesystem/library/validator.php";

$jobListingView = new JobListingView();
//Check if 'jobListing_id' is present in the query string of the URL, if not redirect to index page.
if (Validator::isLoggedIn()) {
    $jobListingId = htmlspecialchars($_GET["id"]);
    $jobAdDetail = $jobListingView->fetchJobAdByJobListingId($jobListingId);
    if (!$jobAdDetail) {
        header("Location: ./index.php");
        exit();
    }
} else {
    header("Location: ./index.php");
    exit();
}
$isLoggedInAsEmployer = Validator::isLoggedInAsEmployer();
$isJobAdOwner = Validator::isJobAdOwner($jobAdDetail->company_name);
?>
<div class="container">
    <div class="flex-container">
        <div class="col">
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <?php
                echo '<a ' . ($isLoggedInAsEmployer && $isJobAdOwner ? 'href="companyjobads.php"' : 'href="index.php"') . '>' . translate("goBack") . '</a>';
                ?>
            </div>
        </div>
        <div>
            <?php
            echo '<button type="button" class="btn btn-primary" ' . ($isLoggedInAsEmployer ? 'hidden' : '') . '>' . translate("send_message_button") . '</button></div>';
            //Show Edit and Delete job advertisement buttons for job ad creator.
            if ($isJobAdOwner) {
                echo '
        <div>
            <a class="btn editButton" href="editJobAd.php?id=' . $jobAdDetail->jobListing_id . '";><i class="fa-regular fa-pen-to-square"></i>' . translate("edit_jobad_button") . '</a>
        </div>';
                echo '        
            <form action="./controllers/JobListingController.php" method="post" onsubmit="return confirmDeletion();">  
                <input type="hidden" name="type" value="deleteJobAd">  
                <input type="hidden" name="jobListing_id" value="' . $jobAdDetail->jobListing_id . '">                  
                <button class="btn deleteButton" type="submit"> <i class="fa-regular fa-trash-can"></i>' . translate("delete_button") . '</button>           
            </form>';
            }
            ?>
        </div>
        <?php ErrorHandler::displaySuccess(); ?>
        <div class="job-listing-small m-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <b><?php echo $jobAdDetail->company_name; ?></b>
                        </div>
                        <div class="col-5">
                            <?php echo translate("industry") . ': ' . '<b>' . $jobAdDetail->industry_name; ?></b>
                        </div>
                        <div class="col applicationDeadlineDateBadge">
                            <?php echo translate("applicationDeadline") . ': ' . date(
                                'd-m-Y',
                                strtotime($jobAdDetail->application_deadline)
                            ); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <b style="font-size: 20px;"><?php echo $jobAdDetail->job_title; ?></b>
                        </div>
                        <div class="col-5 mt-2">
                            <?php echo translate("position_name_label") . ': ' . '<b>' . $jobAdDetail->position_name; ?></b>
                        </div>
                        <div class="col-6 mt-2">
                            <?php echo translate("form_of_employment") . ': ' . '<b>' . $jobAdDetail->jobType; ?></b>
                        </div>
                        <div class="col-6 mt-2">
                            <?php echo translate("location") . ': ' . '<b>' . $jobAdDetail->location_name; ?></b>
                        </div>
                    </div>
                    <div class="flex-container mt-2">
                        <div>
                            <?php echo translate("published_date") . ': ' . '<b>' . date('d-m-Y', strtotime($jobAdDetail->published_time)); ?></b>
                        </div>
                        <?php
                        echo '
                        <div>
                            <a class="btn btn-primary" data-toggle="collapse"
                                href="applyjob.php?id=' . $jobAdDetail->jobListing_id . '" role="button"
                                aria-expanded="false" ' . ($isLoggedInAsEmployer ? ' hidden' : '') . '>' . translate("apply_for_job_button") . '</a>
                        <a class="btn btn-primary" data-toggle="collapse" href="listcompanyjobapplications.php?id=' .
                            $jobAdDetail->jobListing_id . '" role="button" aria-expanded="false" ' . ($isJobAdOwner
                                ? '' : 'hidden') . '>' . translate("view_all_jobApplication_button") . '</a>
                        </div>'
                        ?>
                    </div>
                </div>

            </div>
            <div class=" job-content mt-3">
                <h4><b><?php echo translate("jobdescription_label"); ?></b></h4>
                <p>
                    <?php echo $jobAdDetail->description ?>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include "components/footer.php" ?>

<!--This function is used to popup the message for the user to confirm if the user wants to delete the job advertisement-->
<script>
function confirmDeletion() {
    return confirm("Er du sikker på at du vil slette denne jobbannonsen?");
}
</script>