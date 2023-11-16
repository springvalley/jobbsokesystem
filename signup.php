<?php
include "components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";

$helperModel = new Helper();
?>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card" style="border-radius: 1rem;">
                <div class="card-body p-3">
                    <h1>Registrer bruker</h1>
                    <?php ErrorHandler::displayError() ?>
                    <?php ErrorHandler::displaySuccess() ?>
                    <nav style="margin-bottom: 1rem">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Jobbsøker</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Arbeidsgiver</button>
                        </div>
                    </nav>
                    <!--Job seekers-->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <form action="./controllers/users.controller.php" method="POST">
                                <input name="jobapplicant" value=1 hidden />
                                <input name="industry" value=1 hidden />
                                <input name="orgNumber" value=9999999 hidden />
                                <input name="type" value="register" hidden />
                                <div class="form-group">
                                    <label for="name">Navn</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        aria-describedby="name" placeholder="Skriv inn ditt navn">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-post</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="email" placeholder="Skriv inn din email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefon</label>
                                    <input type="phone" class="form-control" name="phone" id="phone"
                                        aria-describedby="phone" placeholder="Skriv inn ditt telefonnummer">
                                </div>
                                <div class="form-group">
                                    <label for="password">Passord</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Skriv inn ditt passord">
                                </div>
                                <div class="form-group">
                                    <label for="repeatPassword">Bekreft passord</label>
                                    <input type="password" class="form-control" name="repeatPassword"
                                        id="repeatPassword" placeholder="Skriv inn ditt passord igjen">
                                </div>
                                <div class="form-group">
                                    <label for="location">Hvor bor du?</label>
                                    <select class="form-select" name="location">
                                        <option selected value="0">Velg Sted</option>
                                        <?php
                                        $data = $helperModel->getAllLocations();
                                        foreach ($data as $location) {
                                            echo '<option value="' . $location->location_id . '">' . $location->location_name . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="location">Hva er din høyeste utdanning?</label>
                                    <select class="form-select" name="education">
                                        <option selected value="0">Velg Utdanningsnivå</option>
                                        <?php
                                        $data = $helperModel->getAllEducations();
                                        foreach ($data as $education) {
                                            echo '<option value="' . $education->educationlevel_id . '">' . $education->educationlevel_name . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Last opp din CV</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center mt-3">
                                        <a href="login.php" id="cancelButton" class="btn btn-danger"
                                            style="margin-right: 10px">Avbryt</a>
                                        <button name="submit" type="submit" id="loginButton"
                                            class="btn btn-primary">Registrer</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Employers-->
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="./controllers/users.controller.php" method="POST">
                                <input name="jobapplicant" value=0 hidden />
                                <input name="education" value=1 hidden />
                                <input name="type" value="register" hidden />
                                <div class="form-group">
                                    <label for="name">Bedriftsnavn</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        aria-describedby="companyname" placeholder="Skriv inn navnet på din bedrift">
                                </div>
                                <div class="form-group">
                                    <label for="orgNumber">Organisasjonsnummer</label>
                                    <input type="number" class="form-control" name="orgNumber" id="orgNumber"
                                        aria-describedby="orgNumber"
                                        placeholder="Skriv inn bedriftens organisasjonsnummer">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-post</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="email" placeholder="Skriv inn din email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefon</label>
                                    <input type="phone" class="form-control" name="phone" id="phone"
                                        aria-describedby="phone" placeholder="Skriv inn ditt telefonnummer">
                                </div>
                                <div class="form-group">
                                    <label for="password">Passord</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Skriv inn ditt passord">
                                </div>
                                <div class="form-group">
                                    <label for="repeatPassword">Bekreft passord</label>
                                    <input type="password" class="form-control" name="repeatPassword"
                                        id="repeatPassword" placeholder="Skriv inn ditt passord igjen">
                                </div>
                                <div class="form-group">
                                    <label for="location">Hvor bor du?</label>
                                    <select class="form-select" name="location">
                                        <option selected value="0">Velg Sted</option>
                                        <?php
                                        $data = $helperModel->getAllLocations();
                                        foreach ($data as $location) {
                                            echo '<option value="' . $location->location_id . '">' . $location->location_name . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="industry">Hvilken industri jobber dere i?</label>
                                    <select class="form-select" name="industry">
                                        <option selected value="0">Velg Industi</option>
                                        <?php
                                        $data = $helperModel->getAllIndustries();
                                        foreach ($data as $industry) {
                                            echo '<option value="' . $industry->industry_id . '">' . $industry->industry_name . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <!--Denne må endres til en button når vi får forms-->
                                <div class="row">
                                    <div class="col-md-12 text-center mt-3">
                                        <a button href="login.php" id="cancelButton" class="btn btn-danger"
                                            style="margin-right: 10px">Avbryt</a>
                                        <button name="submit" type="submit" id="loginButton"
                                            class="btn btn-primary">Registrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<?php include "components/footer.php" ?>