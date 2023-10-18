<?php include "components/header.php";

include_once "models\jobListing/tempJobListing.model.php";
include_once "models\jobListing\jobListing.viewModel.php";

$jobToGet = $_GET["id"];
if(!isset($_GET["id"])){
    header("location: index.php");
    exit();
}

$jobListingViewModel = new JobListingViewModel($jobToGet);

?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="index.php">Tilbake søkeresultat</a>
            </div>
        </div>
        <div>
            <button type="button" class="editProfileButton">Send melding</button>
        </div>
    </div>
    <div class="job-listing-small">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5"><?php echo $jobListingViewModel->getCompanyName()?></div>
                    <div class="col-6">Bransje: <?php echo $jobListingViewModel->getIndustry()?></div>
                    <div class="col">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-1">
                        <b style="font-size: 20px;"><?php echo $jobListingViewModel->getJobTitle() ?></b>
                    </div>
                    <div class="col-6 mt-1"><?php echo $jobListingViewModel->getJobType()?></div>
                    <div class="col-6 mt-1"><?php echo $jobListingViewModel->getLocation()?></div>

                </div>
                <div class="flex-container mt-1">
                    <div>Publiseringdato: <?php echo $jobListingViewModel->getTime()?></div>
                    <div style="color: red;">Frist: dd.mm.YYYY</div>
                    <div>
                        <a class="btn btn-primary" data-toggle="collapse" href="applyjob.php?id=<?php echo $jobListingViewModel->getListingID()?>" role="button" aria-expanded="false">Søk Stilling</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="job-content mt-3">
            <h4><b>Om jobben</b></h4>
            <p>
            <?php echo $jobListingViewModel->getDescription()?>
            </p>

        </div>
    </div>
</div>
<?php include "components/footer.php" ?>