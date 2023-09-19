<?php include "components/header.php" ?>
<br>
<br>
<div class="container">
    <form>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-8 form-group">
                <h1>Lag en ny jobbannonse!</h1>
                <label for="companyName">Firmanavn</label>
                <input type="text" class="form-control" id="companyName" aria-describedby="emailHelp" placeholder="Skriv inn ditt firmanavn">
            </div>
            <div class="col-sm-8 form-group">
                <label for="sectorName">Bransje</label>
                <input type="text" class="form-control" id="sectorName" aria-describedby="emailHelp" placeholder="Bransje">
            </div>
            <div class="col-sm-8 form-group">
                <label for="positionName">Stillingstittel</label>
                <input type="text" class="form-control" id="positionName" aria-describedby="emailHelp" placeholder="Stillingstittel">
            </div>
            <div class="col-sm-8 form-group">
                <label for="positionName">Ansettelesform</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Ansettelesform</option>
                    <option value="1">Heltid</option>
                    <option value="2">Fulltid</option>
                    <option value="3">Freelance</option>
                    <option value="4">Sommerjobb</option>
                </select>
                <!-- <input type="text" class="form-control" id="positionName" aria-describedby="emailHelp" placeholder="Ansettelsesform"> -->
            </div>
            <div class="col-sm-8 form-group">
                <label for="timeFrame">Frist</label>
                <input type="date" class="form-control" id="timeFrame" aria-describedby="emailHelp" placeholder="Frist for ansettelse...">
            </div>
            <div class="col-sm-8 form-group">
                <label for="jobdescription">Jobbbeskrivelse</label>
                <textarea class="form-control" rows="5" id="jobdescription" name="jobdescription" aria-describedby="jobdescription" placeholder="Skriv om jobbstilling her..."></textarea>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-danger">Avbryt</button>
            <button type="submit" class="btn btn-primary">Publiser annonse</button>
        </div>
    </form>
</div>

<?php include "components/footer.php" ?>