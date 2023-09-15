<?php include "components/header_noNav.php" ?>
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3 ">
        </div>
        <div class="col-4 logindiv">
            <h1>Registrer bruker</h1>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Arbeidssøker</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Arbeidsgiver</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form>
                        <div class="form-group">
                            <label for="name">Navn</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Skriv inn ditt navn">
                        </div>
                        <div class="form-group">
                            <label for="email">E-post</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Skriv inn din email">
                        </div>
                        <div class="form-group">
                            <label for="password">Passord</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Skriv inn ditt passord">
                        </div>
                        <div class="form-group">
                            <label for="repeatPassword">Passord</label>
                            <input type="password" class="form-control" name="repeatPassword" id="repeatPassword" placeholder="Skriv inn ditt passord igjen">
                        </div>
                        <div class="form-group">
                            <label for="formFile" class="form-label">Last opp din CV</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <!--Denne må endres til en button når vi får forms-->
                        <a type="submit" class="btn btn-success" href="index.php">Registrer</a>
                        <a type="submit" class="btn btn-danger" href="login.php">Avbryt</a>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form>
                        <div class="form-group">
                            <label for="companyname">Bedriftsnavn</label>
                            <input type="text" class="form-control" name="companyname" id="companyname" aria-describedby="companyname" placeholder="Skriv inn navnet på din bedrift">
                        </div>
                        <div class="form-group">
                            <label for="orgNumber">Organisasjonsnummer</label>
                            <input type="number" class="form-control" name="orgNumber" id="orgNumber" aria-describedby="orgNumber" placeholder="Skriv inn bedriftens organisasjonsnummer">
                        </div>
                        <div class="form-group">
                            <label for="email">E-post</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Skriv inn din email">
                        </div>
                        <div class="form-group">
                            <label for="password">Passord</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Skriv inn ditt passord">
                        </div>
                        <div class="form-group">
                            <label for="repeatPassword">Passord</label>
                            <input type="password" class="form-control" name="repeatPassword" id="repeatPassword" placeholder="Skriv inn ditt passord igjen">
                        </div>
                        <!--Denne må endres til en button når vi får forms-->
                        <a type="submit" class="btn btn-success" href="index.php">Registrer</a>
                        <a type="submit" class="btn btn-danger" href="login.php">Avbryt</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="col-4"></div>
</div>
</div>

<?php include "components/footer.php" ?>