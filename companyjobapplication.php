<?php include "components/header.php" ?>
<?php include "./views/allJobApplicants.viewModel.php"; 
    $allJobApplicantViewModel = new allJobApplicantsViewModel();
    foreach($allJobApplicantViewModel->getAllJobApplicants() as $applicant){
        print_r($applicant);
        echo "<br>";
        echo "<br>";
        echo "<br>";
    }
?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="companydashboard.php">Tilbake Dashboard</a>
            </div>
        </div>      
    </div>
    <h1>Alle søknader</h1>

    <?php include "components/jobapplicationlist.php" ?>
    <?php include "components/jobapplicationlist.php" ?>
    <?php include "components/jobapplicationlist.php" ?>
    <?php include "components/jobapplicationlist.php" ?>
</div>
<?php include "components/footer.php" ?>