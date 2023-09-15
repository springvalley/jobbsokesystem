<?php include "components/header.php" ?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1>Lag en ny jobbannonse!</h1>
            <form>
                <div class="form-group">
                    <label for="companyName">Firmanavn</label>
                    <input type="text" class="form-control" id="companyName" aria-describedby="emailHelp" placeholder="Skriv inn ditt firmanavn">
                </div>
                <div class="form-group">
                    <label for="sectorName">Bransje</label>
                    <input type="text" class="form-control" id="sectorName" aria-describedby="emailHelp" placeholder="Bransje">
                </div>
                <div class="form-group">
                    <label for="positionName">Stillingstittel</label>
                    <input type="text" class="form-control" id="positionName" aria-describedby="emailHelp" placeholder="Stillingstittel">
                </div>
                <div class="form-group">
                    <label for="positionName">Ansettelesform</label>
                    <input type="text" class="form-control" id="positionName" aria-describedby="emailHelp" placeholder="Ansettelsesform">
                </div>
                <div class="form-group">
                    <label for="timeFrame">Frist</label>
                    <input type="date" class="form-control" id="timeFrame" aria-describedby="emailHelp" placeholder="Frist for ansettelse...">
                </div>
                <div class="form-group">
                    <label for="jobdescription">Jobbbeskrivelse</label>
                    <input type="textarea" class="form-control" id="jobdescription" aria-describedby="emailHelp" placeholder="Beskrivelse av jobben">
                </div>
                <button type="submit" class="btn btn-success">Publiser annonse</button>
                <button type="submit" class="btn btn-danger">Avbryt</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<?php include "components/footer.php" ?>