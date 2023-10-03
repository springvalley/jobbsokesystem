<?php include "components/header.php";
include "classes/dbh.php";
include "classes/joblisting.classes.php";
include "classes/joblistingview.classes.php";
include "classes/joblistingcontroller.classes.php";
$joblisting = new JobListingView();
?>
<br>
<br>
<div class="container">
    <form action="postnewjob.inc.php" method="post">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-8 form-group">
                <h1>Lag en ny jobbannonse!</h1>
                <label for="jobtitle">Jobbtittel</label>
                <input type="text" class="form-control" name="jobtitle" placeholder="Jobbtittel">
                <!-- <label for="companyname">Firmanavn</label>
                <input type="text" class="form-control" name="companyname" placeholder="Skriv inn ditt firmanavn"> -->
            </div>
            <div class="col-sm-8 form-group">
                <label for="location">Sted</label>
                <!-- <input type="text" class="form-control" name="location" placeholder="Bransje"> -->
                <select class="form-select" aria-label="Default select example">
                    <option selected>Velg sted</option>
                    <?php
                    while ($location = $joblisting->fetchLocation($locationData, PDO::FETCH_ASSOC)) :;
                    ?>
                        <option value="<?php echo $location["location_id"]; ?>">
                            <?php echo $location["location_name"]; ?>

                        </option>
                    <?php
                    endwhile;
                    // While loop must be terminated
                    ?>

                </select>
            </div>
            <div class="col-sm-8 form-group">
                <label for="industry">Bransje</label>
                <!-- <input type="text" class="form-control" name="sectorName" placeholder="Bransje"> -->
                <select class="form-select" name="industry" aria-label="Default select example">
                    <option selected>Velg bransje</option>
                    <!-- <option value="1">Heltname</option>
                    <option value="2">Fulltname</option>
                    <option value="3">Freelance</option>
                    <option value="4">Sommerjobb</option> -->
                </select>
            </div>
            <!-- <div class="col-sm-8 form-group">
                <label for="jobtitle">Jobbtittel</label>
                <input type="text" class="form-control" name="jobtitle" placeholder="Jobbtittel">
            </div> -->
            <div class="col-sm-8 form-group">
                <label for="positionname">Stillingstittel</label>
                <input type="text" class="form-control" name="positionname" placeholder="Stillingstittel">
            </div>
            <div class="col-sm-8 form-group">
                <label for="jobtype">Ansettelesform</label>
                <select class="form-select" name="jobtype" aria-label="Default select example">
                    <option selected>Ansettelesform</option>
                    <option value="1">Heltname</option>
                    <option value="2">Fulltname</option>
                    <option value="3">Freelance</option>
                    <option value="4">Sommerjobb</option>
                </select>
                <!-- <input type="text" class="form-control" name="positionName" placeholder="Ansettelsesform"> -->
            </div>
            <div class="col-sm-8 form-group">
                <label for="deadline">Frist</label>
                <input type="date" class="form-control" name="deadline" placeholder="Frist for ansettelse...">
            </div>
            <div class="col-sm-8 form-group">
                <label for="jobdescription">Jobbbeskrivelse</label>
                <textarea class="form-control" rows="5" name="jobdescription" name="jobdescription" aria-describedby="jobdescription" placeholder="Skriv om jobbstilling her..."></textarea>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" name="cancel" class="btn btn-danger">Avbryt</button>
            <button type="submit" name="publish" class="btn btn-primary" href="">Publiser annonse</button>
        </div>
    </form>
</div>

<?php include "components/footer.php"; ?>