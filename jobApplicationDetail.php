<?php
include "components/header.php";
require_once "../jobbsokesystem/models/JobApplicationModel.php";
require_once "../jobbsokesystem/views/JobApplicationView.php";
if (isset($_GET["jobApplication_id"])) {
    $jobApplicationId = $_GET["jobApplication_id"];
} else {
    header("Location: ./index.php");
    exit();
}
$jobApplicationId = $_GET["jobApplication_id"];
$jobApplicationView = new JobApplicationView();
$jobApplicationDetail = $jobApplicationView->fetchJobApplication($jobApplicationId);
?>
<div class="container">
    <!-- <div class="goBackLink">
        <i class="fa-solid fa-angle-left"></i>
        <a href="index.php">Tilbake annonsen</a>
    </div> -->
    <div class="row justify-content-center">
        <form>
            <div class="row">
                <div class="job-title">
                    <p> Søknad på stilling som: <?php $jobApplicationDetail->position_name ?></p>
                </div>
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card w-75 ">
                        <div class="card-body candidate-jobapplication">
                            <h4>Kandidat nr.: ###</h4>
                            <ul list-group .list-group-flush>
                                <li class="list-group-item mt-2"><b>Kandidatsnavn:</b></li>
                                <li class="list-group-item mt-2"><b>E-post: </b></li>
                                <li class="list-group-item mt-2"><b>Telefonnummer: </b></li>
                                <li class="list-group-item mt-2"><b>Nåværende eller siste stilling: </b></li>
                                <li class="list-group-item mt-2"><b>Utdanningsnivå: </b></li>
                                <li class="list-group-item mt-2"><b>Søknadstekst: </b></li>
                            </ul>
                            <h4>Dokumenter</h4>
                            <ul list-group .list-group-flush>
                                <li class="list-group-item mt-2"><b>Last ned CV her </b> <i
                                        class="fa-solid fa-download"></i></li>
                                <li class="list-group-item mt-2"><b>Last ned søknadsbrev her </b><i
                                        class="fa-solid fa-download"></i></li>
                                <li class="list-group-item mt-2"><b>Last ned diploma her </b><i
                                        class="fa-solid fa-download"></i></li>
                            </ul>
                            <!-- <div class="form-group col-md-12 text-center">
                                <button id="rejectbtn" type="submit" class="btn btn-danger">Avvis</button>
                                <button id="applyjobb-button" type="submit" class="btn btn-primary">Aksepter</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </form>
</div>


<?php include "components/footer.php" ?>