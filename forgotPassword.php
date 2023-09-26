<?php include "components/header_noNav.php" ?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="login.php">Tilbake Logg inn side</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 text-center">
            <h1>Tilbakestill Passord</h1>
        </div>
        <div class="col-sm-8 text-center">
            <!--Kanskje tekst burde endres???!-->
            <p class="text-center">Vi skal sende et nytt passord til din e-post.</p>
        </div>
    </div>
    <form>
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <label for="exampleInputEmail1">E-post</label>
            </div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Skriv inn din email">
            </div>
            <div class="col-sm"></div>
        </div>
        <!--Denne må endres til en button når vi får forms-->
        <div class="col-sm-12 text-center mt-3">
            <a type="submit" id="loginbutton" class="btn btn-primary">Send</a>

        </div>
    </form>

</div>

<?php include "components/footer.php" ?>