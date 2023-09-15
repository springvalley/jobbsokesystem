<?php include "components/header_noNav.php" ?>
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3">
        </div>
        <div class="col-4 logindiv">
            <h1>Glemt passord</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-post</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Skriv inn din email">
                </div>
                    <!--Denne må endres til en button når vi får forms-->
                    <a type="submit" id="loginbutton" class="btn btn-success">Tilbakestill Passord</a>
                    <a href="login.php">Tilbake</a>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php include "components/footer.php" ?>