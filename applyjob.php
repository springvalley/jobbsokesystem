<?php include "components/header.php" ?>
<div class="container">
    <div class="row">
        <div class="col-2"><a href="index.php">Tilbake til hovedssiden</a></div>
        <div class="col-2"></div>
        <div class="col-6">
            <h3>Søk på stilling som: STILLINGSTITTEL</h3>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-4">
            <form>
                <div class="form-group">
                    <label for="name">Navn</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Skriv inn ditt navn">
                </div>
                <div class="form-group">
                    <label for="email">E-post</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="name" placeholder="Skriv inn din email">
                </div>
                <div class="form-group">
                    <label for="phone">Telefonnummer</label>
                    <input type="number" class="form-control" name="phone" id="phone" aria-describedby="phone" placeholder="Skriv inn ditt telefonnummer">
                </div>
                <div class="form-group">
                    <label for="lastjob">Nåværende eller siste stilling</label>
                    <input type="text" class="form-control" name="lastjob" id="lastjob" aria-describedby="lastjob" placeholder="Nåværende eller siste stilling">
                </div>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Utdanningsnivå</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-4">
                <p>hei</p>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Last opp ny CV</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Last opp motivasjonsbrev</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Andre dokumenter</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
            <button id="applybutton" type="submit" class="btn btn-success">Send søknad</button>
        </form>
    </div>
</div>
<?php include "components/footer.php" ?>