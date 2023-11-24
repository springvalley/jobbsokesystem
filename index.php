<?php
include "components/header.php";
include_once "models\jobListing/tempJobListing.model.php";
include_once "models\jobListing\jobListing.viewModel.php";
require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/views/JobListingView.php";
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";

$helperModel = new Helper();
?>


<div class="container">
    <h1><?php echo translate("find_job_title") ?></h1>
    <div class="row mt-3">
        <div class="col">
            <input type="text" class="form-control" id="searchText" aria-describedby="searchText"
                placeholder="Søk i fritekst (eks: 1,2,3)">
        </div>
        <div class="col">
            <select class="form-select" name="location">
                <?php
                $data = $helperModel->getAllJobTypes();
                echo '<option value="0">' . translate("jobtype_placeholder") . '</option>';
                foreach ($data as $jobtype) {
                    echo '<option value="' . $jobtype->jobType_id . '">' . $jobtype->jobType . '</option>';
                } ?>
            </select>
        </div>
        <div class="col">
            <select class="form-select" name="location">
                <?php
                $data = $helperModel->getAllIndustries();
                echo '<option value="0">' . translate("industry_placeholder") . '</option>';
                foreach ($data as $industry) {
                    echo '<option value="' . $industry->industry_id . '">' . $industry->industry_name . '</option>';
                } ?>
            </select>
        </div>
        <div class="col">
            <select class="form-select" name="location">
                <?php
                $data = $helperModel->getAllLocations();
                echo '<option value="0">' . translate("location_placeholder") . '</option>';
                foreach ($data as $location) {
                    echo '<option value="' . $location->location_id . '">' . $location->location_name . '</option>';
                } ?>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="search-button"><?php echo translate("search_button") ?></button>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-9">
                <p>Alle ledige stillinger(20000)</p>
            </div>
            <div class="col-3">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Filtrer</option>
                    <option value="1">Kristiansand</option>
                    <option value="2">Oslo</option>
                    <option value="3">Trondheim</option>
                </select>
            </div>
        </div>
        <?php
        $jobListingView = new JobListingView();
        $jobAds = $jobListingView->fetchAllJobAds();
        if (!empty($jobAds)) {
            foreach ($jobAds as $jobAd) {
                echo '<div class="card cardhover" style="margin-top: 1.2rem;" >
               <div class="card-body">
                   <div class="row">
                       <div class="col-5"> 
                            <b>' . $jobAd->company_name . '</b>
                       </div>
                       <div class="col-6">
                            '. translate("industry") .': ' . '<b>' . $jobAd->industry_name . '</b>                       
                       </div>
                       <div class="col">
                           <i class="fa-regular fa-heart"></i>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12 mt-2">
                           <b style="font-size: 20px;">' . $jobAd->job_title . '</b>
                       </div>
                       <div class="col-5 mt-2">
                            '. translate("job_title").': ' . '<b>' . $jobAd->position_name . '</b>
                        </div>
                       <div class="col-6 mt-2">
                            '.translate("form_of_employment").': ' . '<b>' . $jobAd->jobType . '</b>
                       </div>
                       <div class="col-6 mt-2">
                            '.translate("location").': ' . '<b>' . $jobAd->location_name . '</b>
                        </div>
                   </div>
                   <div class="flex-container mt-2">
                       <div>                          
                            '.translate("published_date").': ' . '<b>' . date('d-m-Y', strtotime($jobAd->published_time)) . '</b>
                        </div>
                       <div style="color: red; padding-right: 5rem;">
                            '.translate("deadline").': ' . '<b>' . date('d-m-Y', strtotime($jobAd->application_deadline)) . '</b>
                        </div>
                       <div>
                       <a class="btn btn-primary" href="jobadvertisementdetail.php?id=' . $jobAd->jobListing_id . '"role="button">'.translate("see_details_button").'</a>
                       </div>
                   </div>   
                   
               </div>
           </div>';
            }
        }
        ?>
    </div>
    <?php include "components/footer.php" ?>
</div>