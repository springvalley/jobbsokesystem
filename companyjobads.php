<?php include "components/header.php" ?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="companydashboard.php">Tilbake Dashboard</a>
            </div>
        </div>
        <div>
        <a type="submit" id="createJobAdsButton" class="btn btn-primary" href="postnewjob.php">Lag ny jobbannonse</a>           
        </div>
    </div>
    <h1>Alle Jobbannonser</h1>
    <?php include "components/joblist.php" ?>
    <?php include "components/joblist.php" ?>
    <?php include "components/joblist.php" ?>
    <?php include "components/joblist.php" ?>
</div>
<?php include "components/footer.php" ?>