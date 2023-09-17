<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<?php include "components/header.php" ?>
<style>
<?php include "main.css"?>
</style>
<div class="container">
    <div class="goBackLink">
        <i class="fa-solid fa-angle-left"></i>
        <a href="joblist.php">Tilbake annonsen</a>
    </div>
    <div class="row justify-content-center">
        <form>
            <div class="row">
                <div class="job-title">
                    <p> Søk på stilling som: STILLINGSTITTEL</p>
                </div>

                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="name">Navn</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                placeholder="Skriv inn ditt navn">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="email">E-post</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="name"
                                placeholder="Skriv inn din email">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="phone">Telefonnummer</label>
                            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="phone"
                                placeholder="Skriv inn ditt telefonnummer">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="lastjob">Nåværende eller siste stilling</label>
                            <input type="text" class="form-control" name="lastjob" id="lastjob"
                                aria-describedby="lastjob" placeholder="Nåværende eller siste stilling">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="lastjob">Utdanningsnivå</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Utdanningsnivå</option>
                                <option value="1">Grunnskole</option>
                                <option value="2">Videregående/Yrkesskole</option>
                                <option value="3">Fagskole</option>
                                <option value="4">Folkehøyskole</option>
                                <option value="5">Høyere utdanning, 1-4 år</option>
                                <option value="6">Høyere utdanning, 4+ år</option>
                                <option value="7">PhD</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="form-group col-md-8">
                        <label for="formFile" class="form-label">Last opp CV her</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="formFile" class="form-label">Last opp motivasjonsbrev</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="formFile" class="form-label">Andre dokumenter</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>

                </div>
                <div class="form-group col-md-12 text-center">
                    <button id="applyjobb-button" type="submit" class="btn btn-primary">Send søknad</button>
                </div>
            </div>
    </div>
    </form>
</div>


<?php include "components/footer.php" ?>