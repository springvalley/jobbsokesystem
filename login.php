<?php include "components/header_noNav.php" ?>
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3 loginbtndiv">
            <br>
            <br>
                <button type="submit" class="btn btn-primary">Arbeidsgiver <svg xmlns="http://www.w3.org/2000/svg"  style="margin-left: 1rem;"  fill="white" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></button>
                <p></p>
                <button type="submit" class="btn btn-primary">Arbeidssøker <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 1rem;" fill="white" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></button>
        </div>
        <div class="col-4 logindiv">
            <h1>Logg Inn</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-post</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Skriv inn din email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Passord</label>
                    <input type="password" class="form-control" name="passord" id="passord" placeholder="Skriv inn ditt passord">
                </div>
                <p><a href="forgotPassword.php">Glemt passord?</a></p>
                    <!--Denne må endres til en button når vi får forms-->
                    <a type="submit" id="loginbutton" class="btn btn-success" href="index.php">Logg inn</a>
                <p>Har du ikke en konto?<a href="signup.php"> Registrer deg her</a></p>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php include "components/footer.php" ?>