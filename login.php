<?php include "components/header.php" ?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-2">
            <br>
            <br>
            <br>
                <button type="submit" class="btn btn-primary">Arbeidsgiver</button>
                <p></p>
                <button type="submit" class="btn btn-primary">Arbeidssøker</button>
        </div>
        <div class="col-5">
            <h1>Logg Inn</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-post</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Passord</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <p><a href="forgotPassword.php">Glemt passord?</a></p>
                <a href="index.php">loggin
                    <button type="submit" class="btn btn-success" href="index.php">Logg inn</button>
                </a>
                <p>Har du ikke en konto?<a href="signup.php"> Registrer deg her</a></p>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<?php include "components/footer.php" ?>