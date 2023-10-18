<?php
include "..\models\jobListing/tempJobListing.model.php";
include "..\models\jobListing\jobListing.viewModel.php";
$jobApplicantView = new JobListingViewModel(1);
?>

<div class="row">
    <div class="col-sm-12 mb-3">
        <div class="card cardhover">
            <div class="card-body">
                <h5 class="card-title">Kandidatsnavn:</h5>
                <div class="col-6 mt-1"><b>Søknadsdato: </b></div>

                <div class="row">                
                <div class="col-6 mt-1"><b>Stillingtittel: </b></div>
                <div class="col-6 mt-1"><b>Ansettelsesform</b></div>
                <div class="col-6 mt-1"><b>Sted</b></div>
                

            </div>
            <div class="flex-container mt-1">             
                <div style="color: red;">Frist for å sende søknad: dd.mm.YYYY</div>
                <div>
                    <a class="btn btn-primary" data-toggle="collapse" href="jobapplication.php" role="button" aria-expanded="false">Se
                        søknad</a>
                </div>
            </div>
            </div>
            
        </div>
    </div>

</div>