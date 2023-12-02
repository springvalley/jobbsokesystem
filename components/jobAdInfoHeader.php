<?php
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "/xampp/htdocs/jobbsokesystem/views/JobListingView.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";


$jobListingView = new JobListingView();
//Check if 'jobListing_id' is present in the query string of the URL, if not redirect to index page.
if (isset($_GET["id"])) {
    $jobListingId = htmlspecialchars($_GET["id"]);
    $jobAdDetail = $jobListingView->fetchJobAdByJobListingId($jobListingId);
}
if (!$jobAdDetail) {
    header("Location: ./index.php");
    exit();
}
?>
<div class="flex-container">
    <div class="col">
        <div class="job-listing-small">
            <div class="card" style="background-color: #ECFDF1; border-color: white; border-radius: 0; ">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "components/footer.php" ?>