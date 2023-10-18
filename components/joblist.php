<?php
include_once "models\jobListing/tempJobListing.model.php";
include_once "models\jobListing\jobListing.viewModel.php";
?>

<div class="job-listing-small">
    <div class="card cardhover">
        <div class="card-body">
            <div class="row">
                <div class="col-5"><?php echo $jobListingView->getCompanyName()?></div>
                <div class="col-6"><?php echo $jobListingView->getIndustry()?></div>
                <div class="col">
                    <i class="fa-regular fa-heart"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-1">
                    <b style="font-size: 20px;"><?php echo $jobListingView->getJobTitle()?></b>
                </div>
                <div class="col-6 mt-1"><?php echo $jobListingView->getDescription()?>:</div>
                <div class="col-6 mt-1"><?php echo $jobListingView->getJobType()?></div>
                <div class="col-6 mt-1"><?php echo $jobListingView->getLocation()?></div>

            </div>
            <div class="flex-container mt-1">
                <div>Publiseringdato: <?php echo $jobListingView->getTime()?></div>
                <div style="color: red;">Frist: dd.mm.YYYY</div>
                <div>
                    <a class="btn btn-primary" data-toggle="collapse" href="jobadvertisementdetail.php?id=<?php echo $jobListingView->getListingID()?>" role="button" aria-expanded="false">Se
                        annonse</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="overflow-auto collapse" id="joblist" style="height: 200px">
            <p class="card-text">Lorem ipsum osv</p>
            <button class="btn btn-primary">Søk Jobb</button>
        </div>
    </div>
</div>