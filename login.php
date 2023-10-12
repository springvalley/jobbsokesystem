<?php include "components/header.php" ?>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card" style="border-radius: 1rem;">
                <div class="card-body p-5">
                    <h1>Logg Inn</h1>
                    <p class="errormessage"><?php
                                            if (isset($_GET["error"])) {
                                                $error = $_GET["error"];
                                                switch ($error) {
                                                    case "stmtFailed":
                                                        echo "En uventet feil skjedde, kontakt systemadministrator";
                                                        break;
                                                    case "emptyInputs":
                                                        echo "Vennligst fyll ut alle feltene";
                                                        break;
                                                    case "userNotFound":
                                                        echo "Brukeren ble ikke funnet";
                                                        break;
                                                    case "wrongPassword":
                                                        echo "Passordet er feil, vennligst prøv igjen";
                                                        break;
                                                    case "userCreated":
                                                        echo "Brukeren ble opprettet!";
                                                        break;
                                                    default:
                                                        echo "En uventet feil skjedde, kontakt systemadministrator";
                                                }
                                            };
                                            ?></p>
                    <nav style="margin-bottom: 1rem">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Jobbsøker</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Arbeidsgiver</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="./controllers/users.controller.php" method="POST">
                                <input name="type" value="login" hidden/>
                                <input name="jobapplicant" value=1 hidden />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-post</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Skriv inn din email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Passord</label>
                                    <input type="password" class="form-control" name="password" id="passord" placeholder="Skriv inn ditt passord">
                                </div>
                                <p><a href="forgotPassword.php">Glemt passord?</a></p>
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <a id="cancelButton" class="btn btn-danger" style="margin-right: 10px" href="index.php">Avbryt</a>
                                        <button name="submit" type="submit" id="loginButton" class="btn btn-primary">Logg inn</button>
                                    </div>
                                </div>
                                <p style="text-align:center">
                                    Har du ikke en konto?
                                    <a href="signup.php"> Registrer deg her</a>
                                </p>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="./controllers/users.controller.php" method="POST">
                                <div class="form-group">
                                    <input name="type" value="login" hidden/>
                                    <input name="jobapplicant" value=0 hidden />
                                    <label for="exampleInputEmail1">E-post</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Skriv inn din email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Passord</label>
                                    <input type="password" class="form-control" name="password" id="passord" placeholder="Skriv inn ditt passord">
                                </div>
                                <p><a href="forgotPassword.php">Glemt passord?</a></p>
                                <!--Denne må endres til en button når vi får forms-->
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <a id="cancelButton" class="btn btn-danger" style="margin-right: 10px" href="index.php">Avbryt</a>
                                        <button name="submit" type="submit" id="loginButton" class="btn btn-primary">Logg inn</button>
                                    </div>
                                </div>
                                <p style="text-align:center">
                                    Har du ikke en konto?
                                    <a href="signup.php"> Registrer deg her</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "components/footer.php" ?>